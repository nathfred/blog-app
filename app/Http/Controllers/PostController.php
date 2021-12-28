<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Post::get();
        return view('admin.post.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::get();
        return view('admin.post.create', compact('category'));
    }

    public function insert(Request $request)
    {
        // dd($request);
        $request->validate(Post::$rules);
        $requests = $request->all();
        $requests['thumbnail'] = "";
        if ($request->hasFile('thumbnail')) {
            $files = Str::random("20") . "-" . $request->thumbnail->getClientOriginalName();
            $request->file('thumbnail')->move("file/post/", $files);
            $requests['thumbnail'] = "file/post/" . $files;
        }

        $post = Post::create($requests);
        if ($post) {
            return redirect('admin/post')->with('status', 'Berhasil Menambah Post!');
        }

        return redirect('admin/post')->with('status', 'Gagal Menambah Post!');
    }

    public function edit($id)
    {
        $data = Post::find($id);
        $category = Category::get();
        return view('admin.post.edit', compact(['data', 'category']));
    }

    public function update(Request $request, $id)
    {
        $d = Post::find($id);
        if ($d == NULL) {
            return redirect('admin/post')->with('status', 'Post Tidak Ditemukan!');
        }

        $req = $request->all();

        if ($request->hasFile('thumbnail')) {
            if ($d->thumbnail !== NULL) {
                File::delete($d->thumbnail);
            }
            $post = Str::random("20") . "-" . $request->thumbnail->getClientOriginalName();
            $request->file('thumbnail')->move("file/post/", $post);
            $req['thumbnail'] = "file/post/" . $post;
        }

        $data = Post::find($id)->update($req);
        if ($data) {
            return redirect('admin/post')->with('status', 'Post Berhasil Diubah!');
        }
        return redirect('admin/post')->with('status', 'Post Gagal Diubah!');
    }

    public function delete($id)
    {
        $data = Post::find($id);
        if ($data == NULL) {
            return redirect('admin/post')->with('status', 'Post Tidak Ditemukan!');
        }
        if ($data->thumbnail !== NULL || $data->thumbnail !== "") {
            File::delete($data->thumbnail);
        }
        $delete = $data->delete();
        if ($delete) {
            return redirect('admin/post')->with('status', 'Berhasil Hapus Post!');
        }
        return redirect('admin/post')->with('status', 'Gagal Hapus Post!');
    }
}
