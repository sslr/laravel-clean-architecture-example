<?php


namespace Onion\UseCase;


use Onion\Driver\PostRepositoryInterface;
use Onion\Entity\Post;

interface PostUseCaseInterface
{
    public function __construct(PostRepositoryInterface $repository);

    public function index($request) : array;
    public function show(int $id) : Post;
    public function delete(int $id) : bool;
    public function store(Post $post) : bool;
    public function userPosts($request) : array;


}
