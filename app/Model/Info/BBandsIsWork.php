<?php

namespace App\Model\Info;

use Illuminate\Database\Eloquent\Model;

class BBandsIsWork extends Model
{
    protected $connection = 'mysql1';
    protected $table = 'b_bands_is_works';
    protected $keyType = 'string';
    protected $primaryKey = 'Guid';

    protected $fillable = [
        'Guid','CodeGuid','Date','IsWok'
    ];
}
