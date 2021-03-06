<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function register()
    {
        return view('admin.register');
    }

    public function postRegister(Request $request)
    {
        // VALIDASI REQUEST
        $request->validate(User::$rules);

        // ATUR FIELD
        $requests = $request->all();
        $requests['password'] = Hash::make($request->password);
        $requests['email_verified_at'] = Carbon::now('GMT+7');
        $requests['remember_token'] = Str::random(10);

        // IMAGE
        // $file = $request->image;
        // $file_name = 'User_Picture_' . $request->email . '.' . $file->getClientOriginalExtension();
        // $directory = 'file/admin/';
        // $file->move($directory, $file_name);
        // $requests['image'] = $file_name;

        if ($request->hasFile('image')) {
            $files = Str::random("20") . "-" . $request->image->getClientOriginalName(); // FILENAME
            $request->file('image')->move('file/admin/', $files); // MOVE TO LOCAL DIRECTORY
            $requests['image'] = 'file/admin/' . $files; // FIELD FOR IMAGE
        }

        // CREATE USER
        $user = User::create($requests);
        if ($user) {
            return redirect('register')->with('status', 'Berhasil Mendaftar!');
        }

        return redirect('register')->with('status', 'Gagal Register Akun!');
    }

    public function login()
    {
        return view('admin.login');
    }

    public function postLogin(Request $request)
    {
        $requests = $request->all();
        $data = User::where('email', $requests['email'])->first();
        $cek = Hash::check($requests['password'], $data->password);
        if ($cek) {
            Session::put('admin', $data->email);
            Session::put('admin_id', $data->id);
            return redirect('admin');
        }
        return redirect('login')->with('status', 'Gagal Login Admin!');
    }

    public function logout()
    {
        Session::flush();
        return redirect('login')->with('status', 'Berhasil Logout!');
    }

    // EDIT PROFILE
    public function edit($id)
    {
        $user = User::find($id);
        // dd($user);

        return view('admin.profile.edit', compact('user'));
    }

    // POST EDIT PROFILE
    public function update(Request $request, $id)
    {
        // dd($request);

        $d = User::find($id);
        if ($d == NULL) {
            return redirect('admin')->with('status', 'User Tidak Ditemukan! (INVALID ID)');
        }

        // VALIDASI EMAIL & IMAGE
        if ($d->email == $request->email) { // JIKA GANTI EMAIL
            $request->validate(User::$rules_profile_non_email);
        } else { // JIKA TIDAK GANTI EMAIL
            $request->validate(User::$rules_profile);
        }

        $requests = $request->all();
        // $requests['image'] = "";
        if ($request->hasFile('image')) {
            if ($d->image !== NULL) {
                File::delete($d->image);
            }
            $file_name = Str::random("20") . "-" . $request->image->getClientOriginalName();
            $request->file('image')->move("file/admin/", $file_name);
            $requests['image'] = "file/admin/" . $file_name;
        }

        $user = User::find($id)->update($requests);
        if ($user) {
            return redirect('admin/profile/' . $id)->with('status', 'Profile Berhasil Diubah!');
        }
        return redirect('admin/profile/' . $id)->with('status', 'Profile Gagal Diubah!');
    }
}
