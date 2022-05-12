<?php

namespace App\Domain\Links\Service;
use App\Domain\Links\Repository\LinkRepository;
use App\Exception\ValidationException;

final class LinkCreator
{
    private LinkRepository $repository;

    public function __construct(LinkRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Create a new link.
     *
     * @param array $data The form data
     *
     * @return int The new link ID
     */
    public function createLink(array $data): int
    {
        // Input validation
        $this->validateNewUser($data);

        // Insert link
        $linkId = $this->repository->insertLink($data);

        // Logging here: Link created successfully
        //$this->logger->info(sprintf('User created successfully: %s', $userId));

        return $linkId;
    }

    /**
     * Input validation.
     *
     * @param array $data The form data
     *
     * @throws ValidationException
     *
     * @return void
     */
    private function validateNewUser(array $data)
    {
        $errors = [];

        // Here you can also use your preferred validation library

        if (empty($data['name'])) {
            $errors['name'] = 'Input required';
        }

        if (empty($data['link'])) {
            $errors['link'] = 'Input required';
        }

        if ($errors) {
            throw new ValidationException('Please check your input', $errors);
        }
    }
}