<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    protected $with = ['image'];

    protected $fillable = [
        'description',

        'image_id'
    ];

    protected $hidden = [
        'image_id',
    ];

    public function rules(){
        return [
            'description' => 'required',
        ];
    }

    public function image() {
        return $this->belongsTo(Image::class);
    }
}
