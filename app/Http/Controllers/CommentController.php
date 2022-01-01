<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function insert(Request $request)
    {
        // dd($request);
        $request->validate(Comment::$rules);
        $requests = $request->all();

        $comment = Comment::create($requests);
        if ($comment) {
            return back()->with('status', 'Berhasil Menambah Komentar!');
        }

        return back()->with('status', 'Gagal Menambah Komentar!');
    }
}
