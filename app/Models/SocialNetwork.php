<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialNetwork extends Model
{
    protected $with = ['image'];

    protected $fillable = [
        'name',
        'username',
        'profile_link',

        'image_id',
    ];

    protected $hidden = [
        'image_id',
    ];

    public function image() {
        return $this->belongsTo(Image::class);
    }

    public function rules(){
        return [
            'name' => 'required',
            'username' => 'required',
            'profile_link' => 'required',
            'image_id' => 'required',
        ];
    }

}
