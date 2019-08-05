<?php

spl_autoload_register(function ($className) {
    include $className . '.php';
});

$search = '';

if (isset($_GET['search'])) {
    $search = trim($_GET['search']);
}

$queryConnection = new Query("p:localhost", "mayliah", "", "dogs");
$breeds = $queryConnection->getQueryResult("SELECT * FROM breeds WHERE MATCH(breed, about) AGAINST('$search')");

$contentAddress = 'templates/search.php';
$contentValues = ['breeds' => $breeds];
$template = new Template($contentAddress, $contentValues);
$templateContent = $template->getContent();

$layoutAddress = 'templates/layout.php';
$layoutValues = ['title' => 'Результаты поиска',
                 'pageContent' => $templateContent];
$layout = new Template($layoutAddress, $layoutValues);
$layoutContent = $layout->getContent();

print $layoutContent;
