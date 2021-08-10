<?php


namespace Onion\Controller;

use Onion\UseCase\UserUseCaseInterface;
use Onion\Entity\User;

class UserStoreHandler
{
    private $service;

    public function __construct(UserUseCaseInterface $service)
    {
        $this->service = $service;
    }

    public function handle($request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->created_at = now();
        $user->updated_at = now();

        return $this->service->store($user);
    }
}
