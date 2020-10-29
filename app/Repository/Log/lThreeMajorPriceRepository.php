<?php


namespace App\Repository\Log;


use App\Model\Log\lThreeMajorPrice;

class lThreeMajorPriceRepository
{

    private $lThreeMajorPrice;

    public function __construct()
    {
        $this->lThreeMajorPrice = new lThreeMajorPrice();
    }

    public function create(array $array)
    {
        $this->lThreeMajorPrice::create($array);
    }

    public function GetInfoByWhere(array $array)
    {
        return $this->lThreeMajorPrice::where($array)->get();
    }
}
