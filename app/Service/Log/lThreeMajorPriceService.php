<?php


namespace App\Service\Log;


use App\Repository\Log\lThreeMajorPriceRepository;
use Illuminate\Support\Collection;

class lThreeMajorPriceService
{

    private $lThreeMajorPriceRepository;

    public function __construct()
    {
        $this->lThreeMajorPriceRepository = new lThreeMajorPriceRepository();
    }

    public function GetInfoByWhere(array $array):Collection
    {
        return $this->lThreeMajorPriceRepository->GetInfoByWhere($array);
    }

    public function create(array $array)
    {
        $this->lThreeMajorPriceRepository->create($array);
    }

}
