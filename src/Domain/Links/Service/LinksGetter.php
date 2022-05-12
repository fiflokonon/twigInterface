<?php
namespace App\Domain\Links\Service;
use App\Domain\Links\Repository\LinkRepository;
use App\Exception\ValidationException;

final class LinksGetter {


    private LinkRepository $repository;

    public function __construct(LinkRepository $repository)
    {
        $this->repository = $repository;
    }

    public function linksList(): array
    {
        return $this->repository->getLinks();
    }


}