<?php

namespace App\Model\Info;

use Illuminate\Database\Eloquent\Model;

class WeekInventoryDate extends Model
{
    protected $connection = 'mysql1';
    protected $table = 'week_inventory_dates';
    protected $keyType = 'string';
    protected $primaryKey = 'Guid';

    protected $fillable = [
        'Guid','Date'
    ];
}
