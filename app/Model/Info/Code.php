<?php

namespace App\Model\Info;

use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    protected $connection = 'mysql1';
    protected $table = 'codes';
    protected $keyType = 'string';
    protected $primaryKey = 'Guid';

    protected $casts = [
        'Info' => 'json'
    ];

    protected $fillable = [
        'Guid','Code','Name','Info'
    ];
}
