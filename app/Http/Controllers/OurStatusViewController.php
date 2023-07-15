<?php
namespace App\Http\Controllers;

use App\Models\Views\OurStatusView;
use App\Services\OurStatusViewService;
use Illuminate\Http\Request;

class OurStatusViewController
{
    protected $model;
    protected $service;

    public function __construct(OurStatusView $model, OurStatusViewService $service)
    {
        $this->model = $model;
        $this->service = $service;
    }

    public function index() {
        return $this->service->index();
    }
}
