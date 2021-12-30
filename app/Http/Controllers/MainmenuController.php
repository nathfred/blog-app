<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\MainMenu;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreMainMenuRequest;
use App\Http\Requests\UpdateMainMenuRequest;

class MainMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = MainMenu::get();
        return view('admin.mainmenu.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parent = MainMenu::get();
        return view('admin.mainmenu.create', compact('parent'));
    }

    public function insert(Request $request)
    {
        // dd($request);
        $request->validate(MainMenu::$rules);
        $requests = $request->all();
        $requests['file'] = "";
        if ($request->hasFile('file')) {
            $files = Str::random("20") . "-" . $request->file->getClientOriginalName();
            $request->file('file')->move("file/mainmenu/", $files);
            $requests['file'] = "file/mainmenu/" . $files;
        }

        $mainmenu = MainMenu::create($requests);
        if ($mainmenu) {
            return redirect('admin/mainmenu')->with('status', 'Berhasil Menambah Main menu!');
        }

        return redirect('admin/mainmenu')->with('status', 'Gagal Menambah Main menu!');
    }

    public function edit($id)
    {
        $data = MainMenu::find($id);
        $parent = MainMenu::get();
        return view('admin.mainmenu.edit', compact(['data', 'parent']));
    }

    public function update(Request $request, $id)
    {
        $d = MainMenu::find($id);
        if ($d == NULL) {
            return redirect('admin/mainmenu')->with('status', 'Main Menu Tidak Ditemukan!');
        }

        $req = $request->all();

        if ($request->hasFile('file')) {
            if ($d->file !== NULL) {
                File::delete($d->file);
            }
            $mainmenu = Str::random("20") . "-" . $request->file->getClientOriginalName();
            $request->file('file')->move("file/mainmenu/", $mainmenu);
            $req['file'] = "file/mainmenu/" . $mainmenu;
        }

        $data = MainMenu::find($id)->update($req);
        if ($data) {
            return redirect('admin/mainmenu')->with('status', 'Main Menu Berhasil Diubah!');
        }
        return redirect('admin/mainmenu')->with('status', 'Main Menu Gagal Diubah!');
    }

    public function delete($id)
    {
        $data = MainMenu::find($id);
        if ($data == NULL) {
            return redirect('admin/mainmenu')->with('status', 'Main Menu Tidak Ditemukan!');
        }
        if ($data->file !== NULL || $data->file !== "") {
            File::delete($data->file);
        }
        $delete = $data->delete();
        if ($delete) {
            return redirect('admin/mainmenu')->with('status', 'Berhasil Hapus Main Menu!');
        }
        return redirect('admin/mainmenu')->with('status', 'Gagal Hapus Main Menu!');
    }
}
