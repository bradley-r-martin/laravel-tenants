<?php

$endpoints = [
  'except' => ['create', 'edit']
];

Route::resource('api/1.0/tenants', 'BRM\Tenants\app\Controllers\Tenants', $endpoints);
Route::resource('api/1.0/settings', 'BRM\Tenants\app\Controllers\Settings', $endpoints);

Route::get('tenant.js','\BRM\Tenants\app\Controllers\Routing@tenant');