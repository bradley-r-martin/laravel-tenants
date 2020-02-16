<?php

namespace BRM\Tenants\app\Commands;

use Hyn\Tenancy\Models\Hostname;

use Illuminate\Console\Command;

class Provision extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenancy:provision';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Provisions a tenancy';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();       
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(){        
        $domain = $this->ask('Tenant Domain:');
        if($tenant = Hostname::where( 'fqdn', $domain )->first()){
          $passcode = $this->ask('Passcode: (6 chars)');
          $tenant->status = 'provisioning';
          $tenant->passcode = $passcode;
          $tenant->save();
          $this->info( "'{$domain}' is now provisioning and can be accessed using passcode: '{$passcode}'. ");
        }else{
          $this->error( "A tenant with the domain '{$domain}' does not exists." );
          return;
        }
    }


}