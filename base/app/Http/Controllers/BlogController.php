<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Jobs\ProcessCommentJob;
use App\Services\BlogService;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected $blogService;

    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }

    public function storePost(Request $request)
    {
        $post = $this->blogService->createPost($request->all());
        return response()->json($post);
    }

    public function storeComment(Request $request, $postId)
    {
        $post = Post::findOrFail($postId);
        $comment = $this->blogService->createComment($post, $request->all());

        // Dispatch job to process comment
        ProcessCommentJob::dispatch($comment);
        return response()->json($comment);
    }

    public function showPost($postId)
    {
        $post = $this->blogService->getPost($postId);
        $comments = $this->blogService->getCommentsForPost($postId);
        return view('admin.posts', ['posts' => $post, 'comments' => $comments]);
    }

    public function showPostWithComment($postId)
    {
        $posts = $this->blogService->getPostWithComments($postId);
        $pst = Post::get()->toArray();
        $data = compact('posts', 'pst');
        return view('admin.posts')->with($data);
    }



}
