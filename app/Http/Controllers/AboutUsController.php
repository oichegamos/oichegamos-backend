<?php
namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Services\AboutUsService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class AboutUsController extends BaseController
{
    private $model;
    private $service;

    public function __construct(AboutUs $model, AboutUsService $service)
    {
        $this->model = $model;
        $this->service = $service;
    }

    public function index()
    {
        return $this->service->index(null);
    }

    public function update(Request $request)
    {
        return $this->service->update($request, 1);
    }
}
