<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\CategoryService;

class CategoryController extends Controller
{
    public function __construct(Category $model, CategoryService $service)
    {
        $this->model = $model;
        $this->service = $service;
    }
}
