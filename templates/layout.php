<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="styles/style.css">
        <title><?=$title; ?></title>
    </head>
    <body>
        <header class="page-header">
            <a class="header-logo" href="index.php">Породы собак</a>
            <form class="header-search-form" action="search.php" method="GET">
                <input type="search" name="search" class="header-search-field">
                <button type="submit" name="submit" class="header-search-submit">Искать!</button>
            </form>
        </header>
        <main>
            <?=$pageContent; ?>
        </main>
    </body>
</html>