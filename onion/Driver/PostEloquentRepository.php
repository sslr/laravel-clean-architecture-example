<?php


namespace Onion\Driver;

use Onion\Entity\Post;
use App\Models\Post as eloquentPost;

class PostEloquentRepository implements PostRepositoryInterface
{

    public function index($request): array
    {
        return eloquentPost::paginate($request->limit)->toArray();
    }

    public function show(int $id): Post
    {
        $eloquentPost = eloquentPost::find($id);

        $post = new Post();
        $post->id = $eloquentPost->id;
        $post->authorId = $eloquentPost->authorId;
        $post->title = $eloquentPost->title;
        $post->slug = $eloquentPost->slug;
        $post->summary = $eloquentPost->summary;
        $post->content = $eloquentPost->content;
        $post->published = $eloquentPost->published;
        $post->created_at = $eloquentPost->created_at;
        $post->updated_at = $eloquentPost->updated_at;
        $post->publishedAt = $eloquentPost->publishedAt;
        return $post;
    }

    public function delete(int $id): bool
    {
        try {
            eloquentPost::destroy($id);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function store(Post $post): bool
    {
        try {
            eloquentPost::create((array)$post);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function userPosts($request): array
    {
        return eloquentPost::where('authorId', $request->id)->paginate($request->limit)->toArray();
    }

}
