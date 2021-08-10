<?php


namespace Onion\UseCase;

use Onion\Driver\UserRepositoryInterface;
use Onion\Entity\User;

class UserService implements UserUseCaseInterface
{

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index($request): array
    {
        return $this->repository->index($request);
    }

    public function show(int $id): User
    {
        return $this->repository->show($id);
    }

    public function delete(int $id): bool
    {
        return $this->repository->delete($id);
    }

    public function store(User $user): bool
    {
        return $this->repository->store($user);
    }

}
