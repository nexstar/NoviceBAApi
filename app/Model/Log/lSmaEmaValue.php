<?php

namespace App\Model\Log;

use Illuminate\Database\Eloquent\Model;

class lSmaEmaValue extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'l_sma_ema_values';
    protected $keyType = 'string';
    protected $primaryKey = 'Guid';

    protected $casts = [
        'SMaInfo' => 'json',
        'EMaInfo' => 'json',
    ];

    protected $fillable = [
        'Guid','CodeGuid','Date','SMaInfo','EMaInfo'
    ];
}
