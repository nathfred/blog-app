<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Menampilkan semua data
    public function index()
    {
        $data = Category::get();
        return view('admin.category.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    public function insert(Request $request)
    {
        $request->validate(Category::$rules);
        $requests = $request->all();
        $requests['image'] = "";
        if ($request->hasFile('image')) {
            $files = Str::random("20") . "-" . $request->image->getClientOriginalName();
            $request->file('image')->move("file/category/", $files);
            $requests['image'] = "file/category/" . $files;
        }

        $cat = Category::create($requests);
        if ($cat) {
            return redirect('admin/category')->with('status', 'Berhasil Menambah Data!');
        }

        return redirect('admin/category')->with('status', 'Gagal Menambah Data!');
    }

    public function edit($id)
    {
        $data = Category::find($id);
        return view('admin.category.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $d = Category::find($id);
        if ($d == NULL) {
            return redirect('admin/category')->with('status', 'Data Tidak Ditemukan!');
        }

        $req = $request->all();
        if ($request->hasFile('image')) {
            if ($d->image !== NULL) {
                File::delete($d->image);
            }
            $category = Str::random("20") . "-" . $request->image->getClientOriginalName();
            $request->file('image')->move("file/category/", $category);
            $req['image'] = "file/category/" . $category;
        }
    }

    public function delete($id)
    {
        $data = Category::find($id);
        if ($data == NULL) {
            return redirect('admin/category')->with('status', 'Data Tidak Ditemukan!');
        }
        if ($data->image !== NULL || $data->image !== "") {
            File::delete($data->image);
        }
        $delete = $data->delete();
        if ($delete) {
            return redirect('admin/category')->with('status', 'Berhasil Hapus Category!');
        }
        return redirect('admin/category')->with('status', 'Gagal Hapus Category!');
    }
}
