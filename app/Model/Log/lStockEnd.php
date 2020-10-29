<?php

namespace App\Model\Log;

use Illuminate\Database\Eloquent\Model;

class lStockEnd extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'l_stock_ends';
    protected $keyType = 'string';
    protected $primaryKey = 'Guid';

    protected $fillable = [
        'Guid', 'Code'
    ];
}
