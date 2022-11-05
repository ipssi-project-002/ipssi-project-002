<table>
    <thead>
        <tr>
            <th>Nom d’utilisateur</th>
            <th>Prénom</th>
            <th>Nom de famille</th>
            <th>Adresse e-mail</th>
            <th>Numéro de téléphone</th>
            <th>Type de compte</th>
            <th>Date d’inscription</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user) { ?>
            <tr>
                <td><?= $user->getUsername() ?></td>
                <td><?= $user->getFirstName() ?></td>
                <td><?= $user->getLastName() ?></td>
                <td><?= $user->getEmailAddress() ?></td>
                <td><?= $user->getPhoneNumber() ?></td>
                <td><?= $user->getAccountType() ?></td>
                <td><?= App\Utils::formatDate($user->getCreatedTime()) ?></td>
            </tr>
            <tr>
                <?= var_dump($user) ?>
            </tr>
        <?php } ?>
</table>
