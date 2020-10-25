<?php


namespace App\Repository\Log;


use App\Model\Log\lEveryDayPrice;

class lEveryDayPriceRepository
{

    private $lEveryDayPrice;

    public function __construct()
    {
        $this->lEveryDayPrice = new lEveryDayPrice();
    }

    public function GetInfoByWhere(array $array)
    {
        return $this->lEveryDayPrice::where($array)->get();
    }

    public function create($array)
    {
        $this->lEveryDayPrice::create($array);
    }

}
