<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Slider;
use App\Models\Comment;
use App\Models\Category;
use App\Models\MainMenu;
use Illuminate\Http\Request;

class PortalController extends Controller
{
    public function index()
    {
        $data['sliders'] = Slider::where('status', 1)->get();
        $data['posts'] = Post::where('status', 1)->get();
        $data['latestposts'] = Post::where('status', 1)->limit(5)->get();
        $data['headline'] = Post::where('status', 1)->where('is_headline', 1)->get();
        $data['user'] = User::first();
        $data['category'] = Category::get();

        return view('portal.index', compact('data'));
    }

    public function about()
    {
        $data['posts'] = Post::where('status', 1)->get();
        $data['latestposts'] = Post::where('status', 1)->limit(5)->get();
        $data['user'] = User::first();
        $data['category'] = Category::get();

        return view('portal.about', compact('data'));
    }

    public function contact()
    {
        $data['posts'] = Post::where('status', 1)->get();
        $data['latestposts'] = Post::where('status', 1)->limit(5)->get();
        $data['user'] = User::first();
        $data['category'] = Category::get();

        return view('portal.contact', compact('data'));
    }

    public function post()
    {
        $data['posts'] = Post::where('status', 1)->get();
        $data['latestposts'] = Post::where('status', 1)->limit(5)->get();
        $data['user'] = User::first();
        $data['category'] = Category::get();

        return view('portal.post', compact('data'));
    }

    public function postDetail($id)
    {
        $data['posts'] = Post::where('status', 1)->get();
        $data['latestposts'] = Post::where('status', 1)->limit(5)->get();
        $data['user'] = User::first();
        $data['category'] = Category::get();
        $data['comment'] = Comment::where('posts_id', $id)->get();
        $posts = Post::find($id);

        return view('portal.post-detail', compact('posts', 'data'));
    }

    public function menu($id)
    {
        $data['posts'] = Post::where('status', 1)->get();
        $data['latestposts'] = Post::where('status', 1)->limit(5)->get();
        $data['user'] = User::first();
        $data['category'] = Category::get();
        $data['menu'] = MainMenu::find($id);

        return view('portal.menu', compact('data'));
    }

    public function category($id)
    {
        $data['posts'] = Post::where('status', 1)->get();
        $data['latestposts'] = Post::where('status', 1)->limit(5)->get();
        $data['user'] = User::first();
        $data['category'] = Category::get();

        return view('portal.category', compact('data'));
    }

    public function search(Request $request)
    {
        $data['posts'] = Post::where('status', 1)->where('title', 'LIKE', '%' . $request->search . '%')->orWhere('content', 'LIKE', '%' . $request->search . '%')->get();
        $data['latestposts'] = Post::where('status', 1)->limit(5)->get();
        $data['user'] = User::first();
        $data['category'] = Category::get();

        return view('portal.search', compact('data'));
    }
}
