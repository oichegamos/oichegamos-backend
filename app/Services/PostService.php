<?php
namespace App\Services;

use App\Models\Post;

class PostService
{
    protected $model;

    public function __construct(Post $model)
    {
        $this->model = $model;
    }
}
