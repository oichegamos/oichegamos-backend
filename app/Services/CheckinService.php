<?php
namespace App\Services;

use App\Models\Checkin;

class CheckinService
{
    protected $model;

    public function __construct(Checkin $model)
    {
        $this->model = $model;
    }
}
