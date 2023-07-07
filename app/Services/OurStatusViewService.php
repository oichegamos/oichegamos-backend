<?php
namespace App\Services;

use App\Models\Views\OurStatusView;

class OurStatusViewService
{
    private $model;

    public function __construct(OurStatusView $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        return $this->model::first();
    }
}