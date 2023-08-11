<?php

namespace App\Http\Controllers\Blog\Liked;
use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\Comment\StoreRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(Post $post)
    {
        auth()->user()->likedPosts()->toggle($post->id);

        return response(['message' => 'Like change']);
//        return redirect()->back();
    }
}
