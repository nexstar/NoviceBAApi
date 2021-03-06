<?php

namespace App\Model\Log;

use Illuminate\Database\Eloquent\Model;

class lWeekInventory extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'l_week_inventories';
    protected $keyType = 'string';
    protected $primaryKey = 'Guid';

    protected $casts = [
        'Info' => 'json'
    ];

    protected $fillable = [
        'Guid','CodeGuid','Date','Info'
    ];
}
