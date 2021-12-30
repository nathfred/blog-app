<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;

class MessageController extends Controller
{
    public function index()
    {
        $data = Message::get();
        return view('admin.message.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parent = Message::get();
        return view('admin.message.create', compact('parent'));
    }

    public function insert(Request $request)
    {
        // dd($request);
        $request->validate(Message::$rules);
        $requests = $request->all();

        $message = Message::create($requests);
        if ($message) {
            return redirect('admin/message')->with('status', 'Berhasil Menambah message!');
        }

        return redirect('admin/message')->with('status', 'Gagal Menambah message!');
    }

    public function edit($id)
    {
        $data = Message::find($id);
        $parent = Message::get();
        return view('admin.message.edit', compact(['data', 'parent']));
    }

    public function update(Request $request, $id)
    {
        $d = Message::find($id);
        if ($d == NULL) {
            return redirect('admin/message')->with('status', 'message Tidak Ditemukan!');
        }

        $req = $request->all();

        $data = Message::find($id)->update($req);
        if ($data) {
            return redirect('admin/message')->with('status', 'message Berhasil Diubah!');
        }
        return redirect('admin/message')->with('status', 'message Gagal Diubah!');
    }

    public function delete($id)
    {
        $data = Message::find($id);
        if ($data == NULL) {
            return redirect('admin/message')->with('status', 'message Tidak Ditemukan!');
        }

        $delete = $data->delete();
        if ($delete) {
            return redirect('admin/message')->with('status', 'Berhasil Hapus message!');
        }
        return redirect('admin/message')->with('status', 'Gagal Hapus message!');
    }
}
