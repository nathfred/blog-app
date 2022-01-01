<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreSliderRequest;
use App\Http\Requests\UpdateSliderRequest;
use App\Models\Category;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Slider::get();
        return view('admin.slider.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parent = Slider::get();
        $category = Category::get();
        return view('admin.slider.create', compact('parent', 'category'));
    }

    public function insert(Request $request)
    {
        // dd($request);
        $request->validate(Slider::$rules);
        $requests = $request->all();
        $requests['image'] = "";
        if ($request->hasFile('image')) {
            $files = Str::random("20") . "-" . $request->image->getClientOriginalName();
            $request->file('image')->move("file/slider/", $files);
            $requests['image'] = "file/slider/" . $files;
        }

        $slider = Slider::create($requests);
        if ($slider) {
            return redirect('admin/slider')->with('status', 'Berhasil Menambah Slider!');
        }

        return redirect('admin/slider')->with('status', 'Gagal Menambah Slider!');
    }

    public function edit($id)
    {
        $data = Slider::find($id);
        $parent = Slider::get();
        $category = Category::get();
        return view('admin.slider.edit', compact(['data', 'parent', 'category']));
    }

    public function update(Request $request, $id)
    {
        $d = Slider::find($id);
        if ($d == NULL) {
            return redirect('admin/slider')->with('status', 'Slider Tidak Ditemukan!');
        }

        $req = $request->all();

        if ($request->hasFile('image')) {
            if ($d->image !== NULL) {
                File::delete($d->image);
            }
            $slider = Str::random("20") . "-" . $request->image->getClientOriginalName();
            $request->file('image')->move("file/slider/", $slider);
            $req['image'] = "file/slider/" . $slider;
        }

        $data = Slider::find($id)->update($req);
        if ($data) {
            return redirect('admin/slider')->with('status', 'slider Berhasil Diubah!');
        }
        return redirect('admin/slider')->with('status', 'slider Gagal Diubah!');
    }

    public function delete($id)
    {
        $data = Slider::find($id);
        if ($data == NULL) {
            return redirect('admin/slider')->with('status', 'Slider Tidak Ditemukan!');
        }
        if ($data->image !== NULL || $data->image !== "") {
            File::delete($data->image);
        }
        $delete = $data->delete();
        if ($delete) {
            return redirect('admin/slider')->with('status', 'Berhasil Hapus slider!');
        }
        return redirect('admin/slider')->with('status', 'Gagal Hapus slider!');
    }
}
