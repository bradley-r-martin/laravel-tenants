<?php

namespace BRM\Tenants\app\Commands;

use BRM\Tenants\app\Services\Tenants;

use Illuminate\Console\Command;

class Suspend extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenant:suspend {--I|id=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Suspends a tenant';

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
        'status'=>'suspended'
      ]);
      if($response['status']==='success'){
        $this->info('Tenant successfuly suspended!');
        return;
      }
      $this->error('Tenant failed to suspend!');
      print_r($response['data']);
      return;
    }


}