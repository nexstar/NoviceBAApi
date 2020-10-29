<?php

namespace App\Model\Info;

use Illuminate\Database\Eloquent\Model;

class ThreeMajorDate extends Model
{
    protected $connection = 'mysql1';
    protected $table = 'three_major_dates';
    protected $keyType = 'string';
    protected $primaryKey = 'Guid';

    protected $fillable = [
        'Guid', 'CodeGuid', 'Date'
    ];
}
