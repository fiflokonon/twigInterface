<?php

namespace App\Action;

use App\Domain\Links\Service\LinksGetter;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;

final class HomeAction
{
    private $twig;
    public  $linksGetter;

    public function __construct(Twig $twig, LinksGetter $linksGetter)
    {
        $this->twig = $twig;
        $this->linksGetter = $linksGetter;
    }
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response
    ): ResponseInterface {
        $links = $this->linksGetter->linksList();
       return $this->twig->render($response, 'home-page.twig', ['links' => $links]);
    }
}