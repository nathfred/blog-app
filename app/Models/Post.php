<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    // protected $fillable = [
    // ];

    protected $guarded = [
        'id',
    ];

    public static $rules = [
        'title' => 'required|max:100',
        'thumbnail' => 'required',
        'category_id' => 'required|integer',
        'content' => 'required|string',
        'is_headline' => 'required|boolean',
        'status' => 'required|boolean',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
