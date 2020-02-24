<?php

namespace BRM\Tenants\app\Models;

use Hyn\Tenancy\Abstracts\SystemModel;
use Hyn\Tenancy\Models\Website as Contract;

class Website extends Contract
{
    protected $table = 'websites';

    public function hostnames()
    {
        return $this->hasMany(\BRM\Tenants\app\Models\Hostname::class, 'website_id', 'id');
    }
}
