<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = [
        'post_id',
        'name',
        'email',
        'subject',
        'comment',
    ];

    public static $rules = [
        'post_id' => 'required|integer',
        'name' => 'required|string|max:50',
        'email' => 'nullable|string|max:50',
        'subject' => 'nullable|string|max:50',
        'comment' => 'required|string|max:250',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
