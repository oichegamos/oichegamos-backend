<?php
namespace App\Services;

use App\Models\Post;

class PostService extends AbstractService
{
    protected $model;
    protected $relationships = ['image', 'category'];

    public function __construct(Post $model)
    {
        $this->model = $model;
    }

    public function index($paginate)
    {
        return $paginate
            ? $this->model::orderBy('created_at', 'desc')->paginate()
            : $this->model::orderBy('created_at', 'desc')->all();
    }
}
