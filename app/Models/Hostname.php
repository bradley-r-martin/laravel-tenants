<?php

namespace BRM\Tenants\app\Models;

use Hyn\Tenancy\Abstracts\SystemModel;
use Hyn\Tenancy\Models\Hostname as Contract;

class Hostname extends Contract
{
    protected $table = 'hostnames';

    protected $casts = [
      'force_https'=> 'boolean'
    ];

    public function settings()
    {
        return $this->hasOne(\BRM\Tenants\app\Models\Setting::class, 'hostname_id', 'id');
    }
    public function modules()
    {
        return $this->hasOne(\BRM\Tenants\app\Models\Module::class, 'hostname_id', 'id');
    }

    public function websites()
    {
        return $this->hasOne(\BRM\Tenants\app\Models\Website::class, 'id', 'website_id');
    }
}
