<?php

namespace App\Model\Info;

use Illuminate\Database\Eloquent\Model;

class WeekInventoryIswork extends Model
{
    protected $connection = 'mysql1';
    protected $table = 'week_inventory_isworks';
    protected $keyType = 'string';
    protected $primaryKey = 'Guid';

    protected $fillable = [
        'Guid','CodeGuid','Date','IsWok'
    ];
}
