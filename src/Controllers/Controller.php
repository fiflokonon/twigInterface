<?php

namespace App\Controllers;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

abstract class Controller
{
    private $loader;
    protected $twig;

    public function __construct()
    {
        $this->loader = new FilesystemLoader('../templates');
        $this->twig = new Environment($this->loader, [
            'debug' => true,
            'cache' => false
        ]);
        $this->twig->addExtension(new \Twig\Extension\DebugExtension());
    }
}

