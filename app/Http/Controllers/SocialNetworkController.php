<?php
namespace App\Http\Controllers;

use App\Models\SocialNetwork;
use App\Services\SocialNetworkService;

class SocialNetworkController extends Controller
{
    public function __construct(SocialNetwork $model, SocialNetworkService $service)
    {
        $this->model = $model;
        $this->service = $service;
    }
}
