<?php

namespace App\Model\Info;

use Illuminate\Database\Eloquent\Model;

class EveryDayPriceDate extends Model
{
    protected $connection = 'mysql1';
    protected $table = 'every_day_price_dates';
    protected $keyType = 'string';
    protected $primaryKey = 'Guid';

    protected $fillable = [
        'Guid', 'CodeGuid', 'Date'
    ];
}
