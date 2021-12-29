<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainMenu extends Model
{
    use HasFactory;

    protected $table = 'mainmenus';

    // protected $fillable = [
    // ];

    protected $guarded = [
        'id',
    ];

    public static $rules = [
        'title' => 'required|max:50',
        'parent' => 'required|integer',
        'category' => 'required|in:link,content,file',
        'content' => 'nullable|string',
        'file' => 'nullable|max:100',
        'url' => 'nullable|max:100',
        'order' => 'required',
        'status' => 'required',
    ];
}
