<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;

/**
* Контроллер веб-приложения.
*/
class BlogController extends Controller
{
    /**
    * Функция отображения основной страницы веб-приложения.
    */
    public function index()
    {
        $categories = Category::orderBy('title')->get();
        $posts = Post::paginate(4);

        return view('pages.index', [
            'posts' => $posts,
            'categories' => $categories,
        ]);
    }

    /**
    * Функция перехода к странице с постами по определенной категории.
    */
    public function getPostByCategory($slug){
        $categories = Category::orderBy('title')->get();
        $current_category = Category::where('slug',$slug)->first();

        return view('pages.index', [
            'posts' => $current_category->posts()->paginate(4),
            'categories' => $categories,
        ]);
    }

    /**
    * Функция перехода к странице выбранного поста.
    */
    public function getPost($slug_category, $slug_post) {
        $post = Post::where('slug', $slug_post)->first();
        $comments = Comment::descComments()->where('post_id', $post->id)->get();
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

    /**
    * Функция сохранения нового комментария к посту в приложении.
    */
    public function postNewComment(Request $request) {
        $this->validate($request, [
            'user_name' => 'required',
            'comment' => 'required',
        ]);

        $new_comment = Comment::create([
            'post_id' => $request->post_id,
            'user_name' => $request->user_name,
            'comment' => $request->comment,
        ]);
        $new_comment->save();

        return $this->getPost($request->slug_category, $request->slug_post);
    }
}
