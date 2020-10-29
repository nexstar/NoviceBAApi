<?php


namespace App\Service\Log;


use App\Repository\Log\lStockEndRepository;

class lStockEndService
{

    private $lStockEndRepository;

    public function __construct()
    {
        $this->lStockEndRepository = new lStockEndRepository();
    }

    public function create(array $array)
    {
        $this->lStockEndRepository->create($array);
    }

}
