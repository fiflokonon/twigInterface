<?php
namespace  App\Action;

use App\Domain\Links\Service\LinkCreator;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class LinkCreateAction {
    private $linkCreator;

    public function __construct(LinkCreator $linkCreator)
    {
        $this->linkCreator = $linkCreator;
    }


    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response
    ): ResponseInterface {
        // Collect input from the HTTP request
        $data = (array)$request->getParsedBody();

        // Invoke the Domain with inputs and retain the result
        $linkId = $this->linkCreator->createLink($data);

        // Transform the result into the JSON representation
        $result = [
            'user_id' => $linkId
        ];

        // Build the HTTP response
        $response->getBody()->write((string)json_encode($result));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(201);
    }

}