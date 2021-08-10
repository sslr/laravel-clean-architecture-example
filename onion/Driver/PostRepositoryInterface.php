<?php


namespace Onion\Driver;
use Onion\Entity\Post;

interface PostRepositoryInterface
{
    public function index($request) : array;
    public function show(int $id) : Post;
    public function delete(int $id) : bool;
    public function store(Post $post) : bool;
    public function userPosts($request) : array;

}
