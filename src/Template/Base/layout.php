<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($page_title) ? $page_title : 'Le dragon paresseux' ?></title>
    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/public/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/public/favicon/icon-192x192.png">
    <link rel="icon" type="image/png" sizes="180x180" href="/public/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/public/favicon/icon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/public/favicon/icon-16x16.png">
</head>
<body>
    <header></header>
    <main><?= $content ?></main>
    <footer></footer>
</body>
</html>
