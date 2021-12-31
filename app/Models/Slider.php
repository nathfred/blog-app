<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $table = 'sliders';

    // protected $fillable = [
    // ];

    protected $guarded = [
        'id',
    ];

    public static $rules = [
        'title' => 'required|max:100',
        'image' => 'required',
        'url' => 'required|max:50',
        'order' => 'required',
        'status' => 'required',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
