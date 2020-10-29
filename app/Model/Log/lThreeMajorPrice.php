<?php

namespace App\Model\Log;

use Illuminate\Database\Eloquent\Model;

class lThreeMajorPrice extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'l_three_major_prices';
    protected $keyType = 'string';
    protected $primaryKey = 'Guid';

    protected $casts = [
        'Info' => 'json'
    ];

    protected $fillable = [
        'Guid','CodeGuid','Date','Info'
    ];
}
