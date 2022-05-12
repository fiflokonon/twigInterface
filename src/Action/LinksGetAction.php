<?php
namespace App\Action;

use App\Domain\Links\Service\LinksGetter;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class LinksGetAction
{
    private $getter;
    public function __construct(LinksGetter $getter)
    {
        $this->getter = $getter;
    }
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response
    ): ResponseInterface {
        //Invoke
        $links = $this->getter->linksList();

        //Response
        $result = $links;

        $response->getBody()->write(json_encode($result));
        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
    }
}

