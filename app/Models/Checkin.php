<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checkin extends Model
{
    protected $fillable = [
        'title',
        'description',
        'review',
        'coord_x',
        'coord_y',
    ];

    public function rules(){
        return [
            'title' => 'required',
        ];
    }
}
