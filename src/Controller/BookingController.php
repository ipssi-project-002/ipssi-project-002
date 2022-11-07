<?php

namespace App\Controller;

use App\Entity\Booking;
use App\Entity\BookingChange;
use App\Entity\User;
use App\Model\BookingModel;
use App\Model\UserModel;
use App\Controller\ErrorController;

class BookingController extends DefaultController {
    public function __construct() {
        /*
        $this->model = new BookingModel();
        $this->entity = new Booking();
         */
    }

    public function view($params): void {
        $ref = $params['ref'];
        $booking = $this->model->findOne($ref);
        if ($booking) {
            $this->render('Booking/view', $params);
        } else {
            (new ErrorController())->error404([
                'entity' => $this->entity::class,
                'ref' => $ref
            ]);
        }
    }

    public function create(): void {
        $this->render('Booking/create');
    }

    public function createSubmit(): void {
        if ($_SESSION['session']->isLoggedIn()) {
            $user_id = $_SESSION['session']->getUser()->getId();
        } else {
            $user_data = [
                'firstName' => $_POST['first-name'],
                'lastName' => $_POST['last-name'],
                'emailAddress' => $_POST['email-address'],
                'phoneNumber' => $_POST['phone-number'],
                'accountType' => 'Booker'
            ];
            $user = User::fromArray($user_data);
            $user = (new UserModel())->saveOne($user);
            if (! $user) {
                throw new \Exception('Failed to submit booking');
            } else {
                $user_id = $user->getId();
            }
        }
        $arrival_date = new \DateTime($_POST['arrival-datetime']);
        // add one hour to the arrival date to get the departure date
        $departure_date = clone $arrival_date;
        $departure_date->add(new \DateInterval('PT1H'));
        $data = [
            'user' => [ $user_id ],
            'arrivalDate' => $arrival_date,
            'departureDate' => $departure_date,
            'numberOfGuests' => $_POST['number-of-guests']
        ];
        $booking = Booking::fromArray($data);
        $change = BookingChange::fromArray([
            'changeDate' => new \DateTime(),
            'status' => 'pending',
            'author' => [ $user_id ]
        ]);
        $booking->addChange($change);
        (new BookingModel())->saveOne($booking);
    }
}

?>
