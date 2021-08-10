<?php


namespace Onion\Driver;

use Onion\Entity\Post;
use App\Models\Post as eloquentPost;

class PostStaticRepository implements PostRepositoryInterface
{

    public function index($request): array
    {
        return [
            [
                'title' => 'static title 1',
                'slug' => 'static slug 1',
                'content' => 'static content 1',
            ],
            [
                'title' => 'static title 2',
                'slug' => 'static slug 2',
                'content' => 'static content 2',
            ]
        ];
    }

    public function show(int $id): Post
    {
        $post = new Post();
        return $post;
    }

    public function delete(int $id): bool
    {
        return false;
    }

    public function store(Post $post): bool
    {
        return false;

    }

    public function userPosts($request): array
    {
        return ['STATIC TEST'];
    }

}
