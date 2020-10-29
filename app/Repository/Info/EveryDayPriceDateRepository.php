<?php

namespace App\Repository\Info;

use App\Model\Info\EveryDayPriceDate;

class EveryDayPriceDateRepository
{

    private $EveryDayPriceDate;

    public function __construct()
    {
        $this->EveryDayPriceDate = new EveryDayPriceDate();
    }

    public function GetInfoByFind($Guid)
    {
        return $this->EveryDayPriceDate::find($Guid);
    }

    public function GetInfoByWhere(array $array)
    {
        return $this->EveryDayPriceDate::where($array)->get();
    }

    public function create(array $array)
    {
        $this->EveryDayPriceDate::create($array);
    }

    public function Delete($Guid)
    {
        $this->EveryDayPriceDate::where('CodeGuid', $Guid)->delete();
    }

}
