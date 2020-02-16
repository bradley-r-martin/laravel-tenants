<?php
namespace BRM\Tenants\app\Controllers;

class Settings extends \Illuminate\Routing\Controller
{
    use \BRM\Vivid\app\Traits\Control;

    public function __construct()
    {
        $this->service = \BRM\Tenants\app\Services\Settings::class;
    }
}
