<?php

(require __DIR__ . '/../config/bootstrap.php')->run();

$loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/../templates/');
$twig = new \Twig\Environment($loader, [
    'debug' => true,
    'cache' => false
]);
$twig->addExtension(new \Twig\Extension\DebugExtension());
