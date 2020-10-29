<?php


namespace App\Repository\Info;


use App\Model\Info\ThreeMajorDate;

class ThreeMajorDateRepository
{

    private $ThreeMajorDate;

    public function __construct()
    {
        $this->ThreeMajorDate = new ThreeMajorDate();
    }

    public function GetInfoByWhere(array $array)
    {
        return $this->ThreeMajorDate::where($array)->get();
    }

    public function create(array $array)
    {
        $this->ThreeMajorDate::create($array);
    }
}
