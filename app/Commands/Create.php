<?php

namespace BRM\Tenants\app\Commands;

use Hyn\Tenancy\Contracts\Repositories\HostnameRepository;
use Hyn\Tenancy\Contracts\Repositories\WebsiteRepository;
use Hyn\Tenancy\Environment;
use Hyn\Tenancy\Models\Hostname;
use Hyn\Tenancy\Models\Website;

use BRM\Tenants\app\Models\Preference;


use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class Create extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenancy:create';

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
     

        $domain = $this->ask('Domain:');
        $company = $this->ask('Company:');
        $name = $this->ask('Contact Name:');
        $email = $this->ask('Email:');

        if ($this->tenantExists($domain)) {
            $this->error("A tenant with the domain '{$domain}' already exists.");
            return;
        }
    

        $this->make('website');
        $this->make('hostname', [
          'domain'=> $domain,
          'company'=> $company
        ]);

        // swap the environment over to the hostname
        app(Environment::class)->hostname($this->hostname);

        $this->make('preferences');
 
        // Make tenacy account
        $this->make('user', [
          'name' => $name,
          'email' => $email,
          'password' => Hash::make('secret')
        ]);
        // Migrate Tenancy
        $this->migrate();
     
        $this->info("Tenant '{$company}' created for {$domain}");
        $this->info("The user '{$email}' can log in with password secret");
    }

    private function make($type, $data = [])
    {
        if ($type==='user') {
            $this->user = User::create($data);
            return $this->user;
        } elseif ($type==='website') {
            $this->website = new Website;
            app(WebsiteRepository::class)->create($this->website);
            return $this->website;
        } elseif ($type==='hostname') {
            $this->hostname = new Hostname;
            $this->hostname->fqdn = $data['domain'];
            $this->hostname->name = $data['company'];
            app(HostnameRepository::class)->attach($this->hostname, $this->website);
        } elseif ($type==='preferences') {
            $this->preferences = new Preference;
            $this->preferences->hostId = $this->hostname->id;
            $this->preferences->save();
        }
    }
    private function migrate()
    {
        if ($this->website) {
            $this->call('tenancy:migrate', [
          '--website_id' => $this->website->id
          ]);
        }
    }


    private function tenantExists($fqdn)
    {
        // check to see if any Hostnames in the database have the same fqdn
        return Hostname::where('fqdn', $fqdn)->exists();
    }
}
