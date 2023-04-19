<?php
namespace App\Http\Controllers;

use App\Models\Image;
use App\Services\ImageService;

class ImageController extends Controller
{
    public function __construct(Image $model, ImageService $service)
    {
        $this->model = $model;
        $this->service = $service;
    }

    public function rotate($id)
    {
        return $this->service->rotate($id);
    }
}
