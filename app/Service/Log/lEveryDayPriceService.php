<?php


namespace App\Service\Log;


use App\Repository\Log\lEveryDayPriceRepository;
use Illuminate\Support\Collection;

class lEveryDayPriceService
{

    private $lEveryDayPriceRepository;

    public function __construct()
    {
        $this->lEveryDayPriceRepository = new lEveryDayPriceRepository();
    }

    public function GetInfoByWhere(array $array): Collection
    {
        return $this->lEveryDayPriceRepository->GetInfoByWhere($array);
    }

    public function create($array)
    {
        $this->lEveryDayPriceRepository->create($array);
    }

}
