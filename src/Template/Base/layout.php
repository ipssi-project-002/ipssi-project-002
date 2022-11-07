<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($page_title) ? $page_title : 'Le Dragon Paresseux' ?></title>
    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="./assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="./assets/favicon/icon-192x192.png">
    <link rel="icon" type="image/png" sizes="180x180" href="./assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/favicon/icon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/favicon/icon-16x16.png">
    <link rel="stylesheet" type="text/css" href="./assets/bootstrap_5.2.2/bootstrap.min.css" />
    <!-- <link rel="stylesheet" type="text/css" href="./assets/css/base/layout.css" /> -->
    <link rel="stylesheet" type="text/css" href="./assets/css/styles.css" />
</head>

<body>
    <header class="mb-auto">
        <div>
            <nav class="nav nav-masthead bg-dark justify-content-center float-md-center">
                <a class="nav-link fw-bold py-4 px-2" href="?page=order&action=create">Commander</a> <!-- active" aria-current="page" -->
                <a class="nav-link fw-bold py-4 px-2" href="?page=booking&action=create">Réserver une table</a>
                <a class="nav-link fw-bold py-4 px-2" href="?page=contact&action=create">Contact</a>
                <?php if ($_SESSION['session']->isLoggedIn()) {
                    $user = $_SESSION['session']->getUser();
                    ?>
                <a class="nav-link fw-bold py-4 px-2" href="?page=user&action=logout"><?= $_SESSION['session']->getUser()->get ?> 
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                    </svg>
                </a>
                <?php } 
                    else { 
                ?>
                <a class="nav-link fw-bold py-4 px-2" href="?page=user&action=login"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                    </svg></a>
                <?php } ?>
            </nav>

        </div>
    </header>
    <main><?= $content ?></main>
    <footer></footer>
    <script defer type="text/javascript" src="./assets/bootstrap_5.2.2/bootstrap.min.js"></script>
    <script defer type="text/javascript" src="/assets/js/base/layout.js"></script>
</body>

</html>
