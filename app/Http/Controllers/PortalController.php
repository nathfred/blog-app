<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Slider;
use App\Models\Comment;
use App\Models\Category;
use App\Models\MainMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $mainmenus1 = DB::table('mainmenus')->where('status', 1)->where('parent', 0)->orderBy('order', 'asc')->get();
        foreach ($mainmenus1 as $menu) {
            $mainmenus2 = DB::table('mainmenus')->where('status', 1)->where('parent', $menu->id)->orderBy('order', 'asc')->get();
        }
        // dd($mainmenus2);

        return view('portal.index', compact('data'));
    }

    // BELUM ADA
    public function about()
    {
        $data['posts'] = Post::where('status', 1)->get();
        $data['latestposts'] = Post::where('status', 1)->limit(5)->get();
        $data['category'] = Category::get();
        $data['user'] = User::first();
        $title = 'About Me';

        return view('portal.about', compact('data', 'title'));
    }

    public function contact()
    {
        $data['posts'] = Post::where('status', 1)->get();
        $data['latestposts'] = Post::where('status', 1)->limit(5)->get();
        $data['category'] = Category::get();
        $data['user'] = User::first();
        $title = 'Contact';

        return view('portal.contact', compact('data', 'title'));
    }

    public function post()
    {
        $data['posts'] = Post::where('status', 1)->get();
        $data['latestposts'] = Post::where('status', 1)->limit(5)->get();
        $data['category'] = Category::get();
        $data['user'] = User::first();
        $title = 'Posts';

        return view('portal.post', compact('data', 'title'));
    }

    public function postDetail($id)
    {
        $data['posts'] = Post::where('status', 1)->get();
        $data['latestposts'] = Post::where('status', 1)->limit(5)->get();
        $data['category'] = Category::get();
        $data['comment'] = Comment::where('post_id', $id)->get();
        $data['user'] = User::first();
        $posts = Post::find($id);
        $title = 'Post Detail';

        return view('portal.detail-post', compact('posts', 'data', 'title'));
    }

    // BELUM ADA
    public function menu($id)
    {
        $data['posts'] = Post::where('status', 1)->get();
        $data['latestposts'] = Post::where('status', 1)->limit(5)->get();
        $data['category'] = Category::get();
        $data['user'] = User::first();
        $data['menu'] = MainMenu::find($id);
        $title = 'Menu';

        return view('portal.menu', compact('data', 'title'));
    }

    public function category($id)
    {
        $data['posts'] = Post::where('status', 1)->where('category_id', $id)->get();
        $data['latestposts'] = Post::where('status', 1)->limit(5)->get();
        $data['category'] = Category::get();
        $data['user'] = User::first();
        $category = Category::find($id);
        $title = $category->name . ' Category';

        return view('portal.category', compact('data', 'title'));
    }

    public function search(Request $request)
    {
        $data['posts'] = Post::where('status', 1)->where('title', 'LIKE', '%' . $request->search . '%')->orWhere('content', 'LIKE', '%' . $request->search . '%')->get();
        $data['latestposts'] = Post::where('status', 1)->limit(5)->get();
        $data['category'] = Category::get();
        $data['user'] = User::first();
        $title = 'Search Posts';

        return view('portal.search', compact('data', 'title'));
    }
}
