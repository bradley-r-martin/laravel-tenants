<?php

namespace BRM\Tenants\app\Services;

class Settings
{
    use \BRM\Vivid\app\Traits\Vivid;
    public function __construct()
    {
        $this->model = \BRM\Tenants\app\Models\Setting::class;
        $this->fields = [
          'domainId',
          'logo',
          'hero',
          'mask',
          'color',
          'privacy',
          'terms'
        ];
        $this->filters = [
        ];
        $this->includes = [
          'tenant'
        ];
        $this->sanitise = [
        ];
        $this->validation = [
          'logo' => ['string'],
          'hero' => ['string']
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
          'domain' => ['required'],
          'passcode' => ['required']
        ];

        $this->hook('beforeSave', function () {
            $website = new Website;
            app(WebsiteRepository::class)->create($website);
            $this->record->website_id = $website->id;
            $this->record->fqdn = $this->data['domain'];
        });

        $this->hook('beforeSave', function () {
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
                $this->record->palette = preg_replace('/\s+/', '', $theme);
            }
        });

        return $this->vivid('store', $data);
    }
}
