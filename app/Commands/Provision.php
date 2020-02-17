<?php

namespace BRM\Tenants\app\Commands;

use BRM\Tenants\app\Services\Tenants;

use Illuminate\Console\Command;

class Provision extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenant:provision {--I|id=} {--P|passcode=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sets tenant to provisioning';

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
      if(!$id = $this->option('id')){
        $id = $this->ask('Id');
      }
      if(!$passcode = $this->option('passcode')){
        $passcode = $this->ask('Passcode (6 digits)');
      }

      $response = (new Tenants())->update([
        'tenant'=>$id,
        'status'=>'provisioning',
        'passcode'=> $passcode
      ]);
      if($response['status']==='success'){
        $this->info('Tenant successfuly set to provisioning!');
        return;
      }
      $this->error('Tenant failed to set to provisioning!');
      print_r($response['data']);
      return;
    }
}