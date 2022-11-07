<?php

namespace App\Controller;

/*
use App\Entity\Booking;
use App\Model\BookingModel;
 */
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
        $first_name = $_POST['first-name'];
        $last_name = $_POST['last-name'];
        $email_address = $_POST['email-address'];
        $phone_number = $_POST['phone-number'];
        $number_of_guests = $_POST['number-of-guests'];
        $arrival_date = $_POST['arrival-date'];
    }
}

?>
