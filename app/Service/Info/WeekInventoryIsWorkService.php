<?php


namespace App\Service\Info;


use App\Repository\Info\WeekInventoryIsWorkRepository;
use Illuminate\Support\Collection;

class WeekInventoryIsWorkService
{

    private $WeekInventoryIsWorkRepository;

    public function __construct()
    {
        $this->WeekInventoryIsWorkRepository = new WeekInventoryIsWorkRepository();
    }

    public function create(array $array)
    {
        $this->WeekInventoryIsWorkRepository->create($array);
    }

    public function GetInfoByAll()
    {
        return $this->WeekInventoryIsWorkRepository->GetInfoByAll();
    }

    public function GetInfoByWhere(array $array):Collection
    {
        return $this->WeekInventoryIsWorkRepository->GetInfoByWhere($array);
    }

}
