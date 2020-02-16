<?php

namespace BRM\Tenants\app\Commands;

use Hyn\Tenancy\Models\Hostname;

use Illuminate\Console\Command;

class Suspend extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenancy:suspend';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Suspends a tenancy';

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
          $tenant->status = 'suspended';
          $tenant->save();
          $this->info( "'{$domain}' is now suspended. ");
        }else{
          $this->error( "A tenant with the domain '{$domain}' does not exists." );
          return;
        }
    }


}