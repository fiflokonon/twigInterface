<?php
namespace App\Controllers;
use App\Controllers\Controller;

class Page extends Controller
{

    /**
     * @throws \Twig\Error\SyntaxError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\LoaderError
     */
    public function makePage()
    {
        $this->twig->display('base.twig', ["message"=> "ok"]);
    }
}