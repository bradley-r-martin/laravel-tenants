<?php

namespace BRM\Tenants\app\Commands;

use Illuminate\Console\Command;

use \BRM\Tenants\app\Services\Tenants;
use \BRM\Tenants\app\Models\Tenant;

class Initialise extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenancy:initialise';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initialise Tenancy';

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
        $once = new Tenant();
        if (!$once->find(1)) {
            if (\App::environment('local')) {
                $tenant = [
                  'name' => 'SIHQ - DEVELOPMENT',
                    'passcode' => '060689',
                    'domain' => 'book.sihq.test',
                    'status' => 'active'
                  ];
                $tenancy = new Tenants();
                $response = $tenancy->store($tenant);
            } else {
                $tenant = [
                  'name' => 'SIHQ',
                    'passcode' => '060689',
                    'domain' => 'admin.book.sihq.com.au',
                    'status' => 'active',
                    'force_https'=>true
                  ];
                $tenancy = new Tenants();
                $response = $tenancy->store($tenant);
            }
        }
    }
}
