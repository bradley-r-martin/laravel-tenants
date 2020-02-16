<?php

namespace BRM\Tenants;

use Illuminate\Support\ServiceProvider;

class FrameworkServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(\Hyn\Tenancy\Providers\TenancyProvider::class);
        $this->app->register(\Hyn\Tenancy\Providers\WebserverProvider::class);

        config([
          'tenancy.website.uuid-limit-length-to-32' => true,
          'tenancy.website.auto-delete-tenant-directory' => true,
          'tenancy.hostname.update-app-url'=> false,
          'tenancy.db.auto-delete-tenant-database' => true,
          'tenancy.db.system-connection-name' => 'mysql',
          'tenancy.db.tenant-migrations-path' => base_path('vendor/bradley-r-martin/*/app/Database/Migrations'),
          'tenancy.db.tenant-seed-class'=> \BRM\Tenants\app\Seed::class,
          'tenancy.models.website' => \BRM\Tenants\app\Models\Provision::class
        ]);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(\Illuminate\Routing\Router $router, \Illuminate\Contracts\Http\Kernel $kernel)
    {
        $this->loadViewsFrom(__DIR__.'/app/Views', 'tenants');
        $this->loadMigrationsFrom(__DIR__.'/app/Migrations');
        $this->loadRoutesFrom(__DIR__.'/app/routes.php');

        $kernel->prependMiddleware(\BRM\Tenants\app\Middleware\EnforceTenancy::class);
        $kernel->pushMiddleware(\BRM\Tenants\app\Middleware\Provisioning::class);
    
        if ($this->app->runningInConsole()) {
            $this->commands([
              \BRM\Tenants\app\Commands\Activate::class,
              \BRM\Tenants\app\Commands\Suspend::class,
              \BRM\Tenants\app\Commands\Create::class,
              \BRM\Tenants\app\Commands\Delete::class,
              \BRM\Tenants\app\Commands\Provision::class,
              \BRM\Tenants\app\Commands\Initialise::class
            ]);
        }
    }
}
