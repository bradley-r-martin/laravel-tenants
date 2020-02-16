<?php

namespace Pursuit\Tenants\app\Commands;

use Illuminate\Console\Command;

use Hyn\Tenancy\Contracts\Repositories\HostnameRepository;
use Hyn\Tenancy\Contracts\Repositories\WebsiteRepository;
use Hyn\Tenancy\Environment;
use Hyn\Tenancy\Models\Hostname;
use Hyn\Tenancy\Models\Website;

class Delete extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenancy:delete {tenant}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete Tentant by id';

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

      $tenant = $this->argument('tenant');
      $website = app( WebsiteRepository::class )->findById( $tenant ); 
      $delete = app( WebsiteRepository::class )->delete( $website, true ); 
    //  dd($delete);
     
    }
}
