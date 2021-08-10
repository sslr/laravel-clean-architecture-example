<?php


namespace Onion\Controller;

use Onion\UseCase\UserUseCaseInterface;
use Onion\Entity\User;

class UserDeleteHandler
{
    private $service;

    public function __construct(UserUseCaseInterface $service)
    {
        $this->service = $service;
    }

    public function handle($request)
    {
        return $this->service->delete($request->id);
    }
}
