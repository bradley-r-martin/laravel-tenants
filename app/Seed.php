<?php

namespace BRM\Tenants\app;

use Illuminate\Database\Seeder;

class Seed extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        foreach (glob(database_path('seeds/testing').'/*.php') as $file) {
            require_once $file;
            $class = substr(basename($file, '.php'), 5);
            if (class_exists($class)) {
                $this->call($class);
            }
        }
    }
}
