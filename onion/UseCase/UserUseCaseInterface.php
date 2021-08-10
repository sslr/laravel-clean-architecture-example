<?php


namespace Onion\UseCase;

use Onion\Driver\UserRepositoryInterface;
use Onion\Entity\User;


interface UserUseCaseInterface
{
    public function __construct(UserRepositoryInterface $repository);

    public function index($request) : array;
    public function show(int $id) : User;
    public function delete(int $id) : bool;
    public function store(User $user) : bool;
}
