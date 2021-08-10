<?php


namespace Onion\Controller;

use Onion\UseCase\UserUseCaseInterface;
use Onion\Entity\User;

class UserShowHandler
{
    private $service;

    public function __construct(UserUseCaseInterface $service)
    {
        $this->service = $service;
    }

    public function handle($request)
    {
        return $this->service->show($request->id);
    }
}
