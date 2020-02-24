<?php

namespace BRM\Tenants\app\Services;

use Hyn\Tenancy\Contracts\Repositories\HostnameRepository;
use Hyn\Tenancy\Contracts\Repositories\WebsiteRepository;
use Hyn\Tenancy\Environment;
use Hyn\Tenancy\Models\Hostname;
use Hyn\Tenancy\Models\Website;

class Tenants
{
    use \BRM\Vivid\app\Traits\Vivid;
    public function __construct()
    {
        $this->model = \BRM\Tenants\app\Models\Hostname::class;
        $this->fields = [
          'name',
          'passcode',
          'force_https',
          'redirect_to',
          'fqdn',
          'status'
        ];
        $this->filters = [
        ];
        $this->includes = [
          'provision',
          'settings',
          'modules'
        ];
        $this->sanitise = [
        ];
        $this->validation = [
          'name' => ['string'],
          'domain' => ['string'],
          'passcode' => ['string']
        ];
    }

    /**
     * store
     *
     * @param mixed $data
     * @return void
     */
    public function store($data = [])
    {
        $this->validation = [
          'name' => ['required'],
          'domain' => ['required','unique:hostnames,fqdn']
        ];

        $this->hook('beforeSave', function () {
            $website = new Website;
            app(WebsiteRepository::class)->create($website);
            $this->record->website_id = $website->id;
            $this->record->fqdn = $this->data['domain'];
        });

        $this->hook('afterSave', function () {
            $modules = [
              'accounts',
              'bugreporting',
              'manage'
            ];
            foreach ($modules as $module) {
                $m = (new \BRM\Tenants\app\Models\Module);
                $m->hostname_id = $this->record->id;
                $m->module = $module;
                $m->save();
            }

            $settings = (new \BRM\Tenants\app\Models\Setting);
            $settings->hostname_id = $this->record->id;
            if (isset($this->data['color'])) {
                $color = $this->data['color'];
                $theme = "
                  :root { 
                    --theme-primary-050:  $color;
                    --theme-primary-100:  $color;
                    --theme-primary-200:  $color;
                    --theme-primary-300:  $color;
                    --theme-primary-400:  $color;
                    --theme-primary-500:  $color;
                    --theme-primary-600:  $color;
                    --theme-primary-700:  $color;
                    --theme-primary-800:  $color;
                    --theme-primary-900:  $color;
                  }
                ";
                $settings->palette = preg_replace('/\s+/', '', $theme);
            }
            if (isset($this->data['logo'])) {
                $settings->logo = $this->data['logo'];
            }
            if (isset($this->data['hero'])) {
                $settings->hero = $this->data['hero'];
            }
            if (isset($this->data['mask'])) {
                $settings->mask = $this->data['mask'];
            }
            $settings->save();
  
            \Artisan::call('tenancy:migrate --website_id='.$this->record->website_id);
            \Artisan::call('tenancy:db:seed --website_id='.$this->record->website_id);
        });

        return $this->vivid('store', $data);
    }
    /**
     * show
     *
     * @param mixed $data
     * @return void
     */
    public function show($data = [])
    {
        $this->validation = [
          'tenant' => ['required']
        ];
        $data['hostname'] = 0;
        if (isset($data['tenant'])) {
            $data['hostname'] = $data['tenant'];
        }
     
        return $this->vivid('show', $data);
    }
    /**
     * show
     *
     * @param mixed $data
     * @return void
     */
    public function update($data = [])
    {
        $this->validation = [
          'tenant' => ['required']
        ];
        $data['hostname'] = 0;
        if (isset($data['tenant'])) {
            $data['hostname'] = $data['tenant'];
        }
     
        return $this->vivid('update', $data);
    }
    /**
     * destroy
     *
     * @param mixed $data
     * @return void
     */
    public function destroy($data = [])
    {
        $this->validation = [
          'tenant' => ['required']
        ];
        $data['hostname'] = 0;
        if (isset($data['tenant'])) {
            $data['hostname'] = $data['tenant'];
        }
     
        return $this->vivid('destroy', $data);
    }
}
