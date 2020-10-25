<?php

namespace App\Model\Log;

use Illuminate\Database\Eloquent\Model;

class lBBands extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'l_b_bands';
    protected $keyType = 'string';
    protected $primaryKey = 'Guid';

    protected $casts = [
        'Info' => 'json'
    ];

    protected $fillable = [
        'Guid','CodeGuid','Date','Info'
    ];
}
