<?php

namespace BRM\Tenants\app\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use \Hyn\Tenancy\Traits\UsesSystemConnection;
    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';
    const DELETED_AT = 'deletedAt';

    protected $casts = [
      'payload' => 'array'
    ];

    protected $hidden = [
      'deletedAt',
      'createdAt',
      'updatedAt',
      'id',
      'hostname_id',
    ];

    protected $dates = [
      'createdAt',
      'updatedAt',
      'deletedAt'
    ];
}
