<?php

spl_autoload_register(function ($className) {
    include $className . '.php';
});

$queryConnection = new Query("p:localhost", "mayliah", "", "dogs");
$breeds = $queryConnection->getQueryResult("SELECT * FROM breeds");

$contentAddress = 'templates/index.php';
$contentValues = ['breeds' => $breeds];
$template = new Template($contentAddress, $contentValues);
$templateContent = $template->getContent();

$layoutAddress = 'templates/layout.php';
$layoutValues = ['title' => 'Породы собак',
                 'pageContent' => $templateContent];
$layout = new Template($layoutAddress, $layoutValues);
$layoutContent = $layout->getContent();

print $layoutContent;

