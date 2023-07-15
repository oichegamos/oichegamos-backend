<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $with = ['image', 'category'];

    protected $fillable = [
        'title',
        'slug',
        'content',

        'category_id',
        'image_id',
    ];

    protected $hidden = [
        'category_id',
        'image_id',
    ];

    public function rules(){
        return [
            'title' => 'required',
            'content' => 'required',
        ];
    }

    public function image() {
        return $this->belongsTo(Image::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
