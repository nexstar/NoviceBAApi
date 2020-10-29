<?php

namespace App\Repository\Log;

use App\Model\Log\lStockEnd;
class lStockEndRepository
{

    private $lStockEnd;

    public function __construct()
    {
        $this->lStockEnd = new lStockEnd();
    }

    public function create(array $array)
    {
        $this->lStockEnd::create($array);
    }

}
