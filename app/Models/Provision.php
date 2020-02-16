<?php

namespace BRM\Tenants\app\Models;


use Hyn\Tenancy\Abstracts\SystemModel;

use Hyn\Tenancy\Models\Website as Contract;

class Provision extends Contract
{
    protected $table = 'websites';

    public function tenants()
    {
        return $this->hasMany(\BRM\Tenants\app\Models\Tenant::class, 'website_id', 'id');
    }
}
