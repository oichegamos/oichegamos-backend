<?php
namespace App\Http\Controllers;

use App\Models\Checkin;
use App\Services\CheckinService;

class CheckinController extends Controller
{
    protected $model;
    protected $service;

    public function __construct(Checkin $model, CheckinService $service)
    {
        $this->model = $model;
        $this->service = $service;
    }
}
