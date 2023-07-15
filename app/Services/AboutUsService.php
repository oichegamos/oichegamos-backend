<?php
namespace App\Services;

use App\Models\AboutUs;

class AboutUsService extends AbstractService
{
    protected $relationships = ['image'];
    
    public function __construct(AboutUs $model)
    {
        $this->model = $model;
    }

    public function index($paginate)
    {
        return $this->model::first();
    }
}