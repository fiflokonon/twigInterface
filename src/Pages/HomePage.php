<?php

namespace  App\Pages;

use http\Env\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ResponseInterface;


class HomePage implements RequestHandlerInterface
{
    #private $logger;
    private $twig;

    public function __construct( \Twig\Environment $twig)
    {
        #$this->logger = $logger;
        $this->twig = $twig;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        #$this->logger->info('Home page handler dispatched');
        //$name = $request->getAttribute('name', 'world');
        $response = new Response();
        $response->getBody()->write(
            $this->twig->render('home-page.twig', ['name' => "fifonsi"])
        );
        return $response;
    }
}