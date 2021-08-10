<?php


namespace Onion\Driver;
use Onion\Entity\User;


interface UserRepositoryInterface
{
    public function index($request) : array;
    public function show(int $id) : User;
    public function delete(int $id) : bool;
    public function store(User $user) : bool;
}
