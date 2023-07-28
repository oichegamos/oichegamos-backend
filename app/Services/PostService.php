<?php
namespace App\Services;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostService extends Service
{
    protected $relationships = ['image', 'category'];

    public function __construct(Post $model)
    {
        $this->model = $model;
    }

    public function getPostBySlug($slug) {
        return $this->model::where('slug', $slug)->firstOrFail();
    }

    public function store(Request $request)
    {
        $request['slug'] = $this->generateUniqueSlug($request->title);
        $request = $this->addRelationships($request);

        return $this->model::create($request->all());
    }

    private function generateUniqueSlug($postTitle)
    {
        $slug = Str::slug($postTitle);
        $count = 2;

        while (Post::where('slug', $slug)->exists()) {
            $slug = Str::slug($postTitle) . '-' . $count;
            $count++;
        }

        return $slug;
    }
}
