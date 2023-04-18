<?php
namespace App\Http\Controllers;

use App\Models\ImageFile;
use App\Services\ImageService;

class ImageController extends Controller
{
    public function __construct(ImageFile $model, ImageService $service)
    {
        $this->model = $model;
        $this->service = $service;
    }

    public function rotate($id)
    {
        return $this->service->rotate($id);
    }
}
