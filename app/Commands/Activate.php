<?php

namespace BRM\Tenants\app\Commands;

use BRM\Tenants\app\Services\Tenants;

use Illuminate\Console\Command;

class Activate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenant:activate {--I|id=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Activates a tenant';

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

      $response = (new Tenants())->update([
        'tenant'=>$id,
        'status'=>'active',
        'passcode'=>''
      ]);
      if($response['status']==='success'){
        $this->info('Tenant successfuly activated!');
        return;
      }
      $this->error('Tenant failed to activate!');
      print_r($response['data']);
      return;
    }

}