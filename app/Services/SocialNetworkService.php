<?php
namespace App\Services;

use App\Models\SocialNetwork;

class SocialNetworkService extends AbstractService
{
    public function __construct(SocialNetwork $model)
    {
        $this->model = $model;
    }
}