<?php
namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\PostService;

class PostController extends Controller
{
    protected $model;
    protected $service;

    public function __construct(Post $model, PostService $service)
    {
        $this->model = $model;
        $this->service = $service;
    }

    public function getPostBySlug($slug) {
        return $this->service->getPostBySlug($slug);
    }
}
