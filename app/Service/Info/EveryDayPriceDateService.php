<?php


namespace App\Service\Info;


use App\Repository\Info\EveryDayPriceDateRepository;
use Illuminate\Support\Collection;

class EveryDayPriceDateService
{

    private $EveryDayPriceDateRepository;

    public function __construct()
    {
        $this->EveryDayPriceDateRepository = new EveryDayPriceDateRepository();
    }

    public function GetInfoByFind($Guid)
    {
        return $this->EveryDayPriceDateRepository->GetInfoByFind($Guid);
    }

    public function GetInfoByWhere(array $array):Collection
    {
        return $this->EveryDayPriceDateRepository->GetInfoByWhere($array);
    }

    public function create(array $array)
    {
        $this->EveryDayPriceDateRepository->create($array);
    }

    public function Delete($Guid)
    {
        $this->EveryDayPriceDateRepository->Delete($Guid);
    }

}
