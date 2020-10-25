<?php

namespace App\Model\Info;

use Illuminate\Database\Eloquent\Model;

class SmaEmaValueIsWork extends Model
{
    protected $connection = 'mysql1';
    protected $table = 'sma_ema_value_is_works';
    protected $keyType = 'string';
    protected $primaryKey = 'Guid';

    protected $fillable = [
        'Guid','CodeGuid','Date','IsWok'
    ];
}
