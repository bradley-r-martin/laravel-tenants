<?php

namespace BRM\Tenants\app\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use \Hyn\Tenancy\Traits\UsesSystemConnection;
    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';
    const DELETED_AT = 'deletedAt';

    protected $casts = [
  
    ];

    protected $hidden = [
      'deletedAt',
      'createdAt',
      'updatedAt',
      'id',
      'hostname_id',
      'smtpEmail',
      'smtpName',
      'smtpHost',
      'smtpPort',
      'smtpUsername',
      'smtpPassword',
      'smtpEncryption'
    ];

    protected $dates = [
      'createdAt',
      'updatedAt',
      'deletedAt'
    ];
}
