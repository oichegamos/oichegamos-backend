<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',

        'category_id'
    ];

    public function rules(){
        return [
            '' => 'required',
        ];
    }
}