<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;

class BlogController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('title')->get();
        $posts = Post::paginate(4);
        return view('pages.index', [
            'posts' => $posts,
            'categories' => $categories,
        ]);
    }

    public function getPostByCategory($slug){
        $categories = Category::orderBy('title')->get();
        $current_category = Category::where('slug',$slug)->first();
        return view('pages.index', [
            'posts' => $current_category->posts()->paginate(4),
            'categories' => $categories,
        ]);
    }

    public function getPost($slug_category, $slug_post) {
        $post = Post::where('slug', $slug_post)->first();
        $comments = Comment::where('post_id', $post->id)->get();
        $categories = Category::orderBy('title')->get();
        $current_category = Category::where('slug',$slug_category)->first();
        return view('pages.show-post', [
            'post' => $post,
            'comments' => $comments,
            'categories' => $categories,
            'slug_category' => $slug_category,
            'current_category' => $current_category,
        ]);
    }

    public function postNewComment(Request $request) {
        $this->validate($request, [
            'user_name' => 'required',
            'comment' => 'required',
        ]);

    }
}