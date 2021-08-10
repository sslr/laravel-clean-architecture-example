<?php


namespace Onion\Controller;

use Onion\UseCase\UserUseCaseInterface;

class UserIndexHandler{
    private $service;

    public function __construct(UserUseCaseInterface $service)
    {
        $this->service = $service;
    }

    public function handle($request)
    {
        return $this->service->index($request);
    }
}
