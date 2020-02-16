<?php

namespace BRM\Tenants\app\Models;

use Hyn\Tenancy\Abstracts\SystemModel;

use Hyn\Tenancy\Models\Hostname as Contract;

class Tenant extends Contract
{
    protected $table = 'hostnames';

    protected $casts = [
      'force_https'=> 'boolean'
    ];

    public function settings()
    {
        return $this->hasOne(\BRM\Tenants\app\Models\Setting::class, 'domainId', 'id');
    }
    public function modules()
    {
        return $this->hasOne(\BRM\Tenants\app\Models\Module::class, 'domainId', 'id');
    }

    public function provision()
    {
        return $this->hasOne(\BRM\Tenants\app\Models\Provision::class, 'id', 'website_id');
    }
}
