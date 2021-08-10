<?php


namespace Onion\Controller;

use Onion\UseCase\PostUseCaseInterface;
use Onion\Entity\Post;

class PostStoreHandler
{
    private $service;

    public function __construct(PostUseCaseInterface $service)
    {
        $this->service = $service;
    }

    public function handle($request)
    {
        $post = new Post();
        $post->authorId = $request->authorId;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->summary = $request->summary;
        $post->content = $request->content;
        $post->published = $request->published;
        $post->publishedAt = $request->publishedAt;
        $post->created_at = now();
        $post->updated_at = now();

        return $this->service->store($post);
    }
}
