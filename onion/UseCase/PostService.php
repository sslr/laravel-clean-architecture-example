<?php


namespace Onion\UseCase;

use Onion\Driver\PostRepositoryInterface;
use Onion\Entity\Post;

class PostService implements PostUseCaseInterface
{

    public function __construct(PostRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index($request): array
    {
        return $this->repository->index($request);
    }

    public function show(int $id): Post
    {
        return $this->repository->show($id);
    }

    public function delete(int $id): bool
    {
        return $this->repository->delete($id);
    }

    public function store(Post $post): bool
    {
        return $this->repository->store($post);
    }

    public function userPosts($request): array
    {
        return $this->repository->userPosts($request);
    }
}
