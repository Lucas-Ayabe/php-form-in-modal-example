<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Form</title>
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/styles.css">
    <script defer src="<?= BASE_URL ?>/assets/js/script.js"></script>
</head>

<body>
    <header class="container">
        <nav>
            <ul>
                <li><a href="<?= BASE_URL ?>">List</a></li>
                <li><a href="<?= BASE_URL ?>/person/create">Create</a></li>
            </ul>
        </nav>
    </header>
    <main class="container">
        <h1><?= $title ?? '' ?></h1>
        <?php $view ? render($viewName, $viewData ?? []) : '' ?>
    </main>
</body>

</html>