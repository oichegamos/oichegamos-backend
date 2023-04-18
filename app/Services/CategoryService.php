<?php
namespace App\Services;

use App\Models\Category;

class CategoryService extends AbstractService
{
    public function __construct(Category $model)
    {
        $this->model = $model;
    }
}