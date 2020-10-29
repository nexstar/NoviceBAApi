<?php


namespace App\Service\Info;


use App\Repository\Info\ThreeMajorDateRepository;
use Illuminate\Support\Collection;

class ThreeMajorDateService
{

    private $ThreeMajorDateRepository;

    public function __construct()
    {
        $this->ThreeMajorDateRepository = new ThreeMajorDateRepository();
    }

    public function GetInfoByWhere(array $array):Collection
    {
        return $this->ThreeMajorDateRepository->GetInfoByWhere($array);
    }

    public function create(array $array)
    {
        $this->ThreeMajorDateRepository->create($array);
    }

}
