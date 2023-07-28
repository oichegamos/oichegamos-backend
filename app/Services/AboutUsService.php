<?php
namespace App\Services;

use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsService extends Service
{
    protected $relationships = ['image'];
    
    public function __construct(AboutUs $model)
    {
        $this->model = $model;
    }

    public function index(Request $request, $paginate)
    {
        return $this->model::first();
    }
}