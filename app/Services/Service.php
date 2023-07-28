<?php
namespace App\Services;

use Illuminate\Http\Request;
use PDOException;

class Service
{
    protected $model;
    protected $relationships = [];
    protected $ignorableFields = ['paginate', 'page'];

    public function index(Request $request, $paginate)
    {
        $query = $this->model::query();

        foreach ($request->all() as $key => $value) {
            if (!in_array($key, $this->ignorableFields)) {
                $valueWithPercents = '%' . $value . '%';
                $query->where($key, 'like', $valueWithPercents);
            }
        }

        return $paginate
            ? $query->orderBy('created_at', 'desc')->paginate()
            : $query->orderBy('created_at', 'desc')->get();
    }

    public function show($id)
    {
        return $this->model::findOrFail($id);
    }

    public function store(Request $request)
    {
        $request = $this->addRelationships($request);

        return $this->model::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $request = $this->addRelationships($request);

        $model = $this->model::findOrFail($id);
        $model->update($request->all());

        return $this->model::findOrFail($id);
    }

    public function destroy($id)
    {
        $model = $this->model::findOrFail($id);
        return $model->delete();
    }

    protected function getUniqueValidationError(PDOException $ex)
    {
        switch($ex->errorInfo[1])
        {
            // duplicate entry
            case 1062:
                $message = $ex->errorInfo[2];
                $words = explode('_', $message);
                if (count($words) === 3)
                {
                    return $words[1];
                }
                break;
        }
    }

    protected function addRelationships(Request $request)
    {
        foreach($this->relationships as $rel) {
            $request = $this->moveIdFromObject($request, $rel);
        }

        return $request;
    }

    private function moveIdFromObject(Request $request, $table)
    {
        $child = $request->input($table);
        if($child != null && in_array('id', array_keys($child))){
            $request->merge([
                "{$table}_id" => $child['id']
            ]);
        }

        return $request;
    }
}