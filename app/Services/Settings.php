<?php

namespace BRM\Tenants\app\Services;

class Settings
{
    use \BRM\Vivid\app\Traits\Vivid;
    public function __construct()
    {
        $this->model = \BRM\Tenants\app\Models\Setting::class;
        $this->fields = [
          'hostname_id',
          'logo',
          'hero',
          'mask',
          'color',
          'privacy',
          'terms'
        ];
        $this->filters = [
        ];
        $this->includes = [
          'tenant'
        ];
        $this->sanitise = [
        ];
        $this->validation = [
          'logo' => ['string'],
          'hero' => ['string']
        ];
    }

}
