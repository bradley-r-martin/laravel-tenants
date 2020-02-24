<?php
namespace BRM\Tenants\app\Controllers;

use Illuminate\Routing\Controller;

class Routing extends Controller{
 
    public function __construct(){
      
    }

    public function tenant(){
      if ($tenant = app(\Hyn\Tenancy\Environment::class)->hostname()) {
        $modules = \BRM\Tenants\app\Models\Module::where('hostname_id', $tenant->id)->get()->toArray();
        $result = implode("',\n   '", array_column($modules, 'module')); // take all 'name' values
        $script = "window.tenant = {
  id: {$tenant->id},
  status: '{$tenant->status}',
  domain: '{$tenant->fqdn}',
  name:   '{$tenant->name}',
  modules: [\n   '{$result}'\n  ]
}";
      }else{
        $script = "window.tenant = {}";
      }
      return \Response::make($script, 200)->header('Content-Type', 'text/javascript');
    }
    
}
