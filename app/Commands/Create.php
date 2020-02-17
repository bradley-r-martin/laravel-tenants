<?php

namespace BRM\Tenants\app\Commands;


use BRM\Tenants\app\Services\Tenants;


use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class Create extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenant:create {--D|domain=} {--N|name=} {--S|status=} {--P|passcode=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a new Tenancy';

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
    public function handle()
    {

      if(!$name = $this->option('name')){
        $name = $this->ask('Name');
      }
      if(!$domain = $this->option('domain')){
        $domain = $this->ask('Domain');
      }
      if(!$status = $this->option('status')){
        $status = $this->choice('Status', ['active', 'suspended','provisioning'], 3);
      }
      $passcode = '';
      if($status === 'provisioning'){
        if(!$passcode = $this->option('passcode')){
          $passcode = $this->ask('Passcode (6 digits)');
        }
      }

      $tenant = [
        'name' => $name,
        'domain' => $domain,
        'status' => $status,
        'passcode' => $passcode
      ];
      $tenancy = new Tenants();
      $response = $tenancy->store($tenant);
      if($response['status']==='success'){
        $this->info('Tenant Successfuly created!');
        $headers = ['Name', 'Domain','Status','Passcode'];
        $this->table($headers, [$tenant]);
        return;
      }
      $this->error('Tenant failed to create!');
      print_r($response['data']);
      return;
    }

}
