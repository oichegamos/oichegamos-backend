<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{    
    protected $fillable = [
        'description',
        'original_name',
        'file_name',
        'file_extension',
        'image_url'
    ];

    public function rules(){
        return [
        ];
    }
}
