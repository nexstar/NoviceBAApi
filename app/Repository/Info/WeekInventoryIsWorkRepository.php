<?php
namespace App\Repository\Info;

use App\Model\Info\WeekInventoryIswork;
class WeekInventoryIsWorkRepository
{

    private $WeekInventoryIswork;

    public function __construct()
    {
        $this->WeekInventoryIswork = new WeekInventoryIswork();
    }

    public function GetInfoByAll()
    {
        return $this->WeekInventoryIswork::all();
    }

    public function create(array $array)
    {
        $this->WeekInventoryIswork::create($array);
    }

    public function GetInfoByWhere(array $array)
    {
        return $this->WeekInventoryIswork::where($array)->get();
    }

}
