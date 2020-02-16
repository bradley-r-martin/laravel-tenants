<?php
namespace BRM\Tenants\app\Controllers;

class Tenants extends \Illuminate\Routing\Controller
{
    use \BRM\Vivid\app\Traits\Control;

    public function __construct()
    {
        $this->service = \BRM\Tenants\app\Services\Tenants::class;
    }
}
