<?php

namespace BRM\Tenants\app\Commands;

use Illuminate\Console\Command;

use BRM\Tenants\app\Services\Tenants;

class Delete extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenant:delete {--I|id=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete Tentant';

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

      $response = (new Tenants())->destroy(['tenant'=>$id]);
      if($response['status']==='success'){
        $this->info('Tenant Successfuly Removed!');
        return;
      }
      $this->error('Tenant failed to remove!');
      print_r($response['data']);
      return;
    }
}
