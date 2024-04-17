<?php

namespace App\Services;

use App\Models\Post;
use App\Models\Comment;

class BlogService
{
    public function createPost(array $data)
    {
        return Post::create($data);
    }

    public function createComment(Post $post, array $data)
    {
        return $post->comments()->create($data);
    }

    public function getPost($postId)
    {
        return Post::findOrFail($postId);
    }

    public function getCommentsForPost($postId)
    {
        return Comment::where('post_id', $postId)->get();
    }

    public function getCommentsWithPost($postId)
    {
        return Comment::where('post_id', $postId)->get();
    }

    public function getPostWithComments($postId)
    {
        return Post::with('comments')->find($postId);
    }
}
