<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($page_title) ? $page_title : 'Le Dragon Paresseux' ?></title>
    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/assets/favicon/icon-192x192.png">
    <link rel="icon" type="image/png" sizes="180x180" href="/assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/favicon/icon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/favicon/icon-16x16.png">

    <link rel="stylesheet" type="text/css" href="/assets/bootstrap_5.2.2/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/assets/css/base/layout.css" />
    <link rel="stylesheet" type="text/css" href="/assets/css/base/styles.css" />
    <script defer type="text/javascript" src="/assets/bootstrap_5.2.2/bootstrap.min.js"></script>
    <script defer type="text/javascript" src="/assets/js/base/layout.js"></script>
</head>
<body>
    <header></header>
    <main><?= $content ?></main>
    <footer></footer>
</body>
</html>
