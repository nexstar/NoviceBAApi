<?php


namespace App\Service\Log;


use App\Repository\Log\lWeekInventoryRepository;

class lWeekInventoryService
{

    private $lWeekInventoryRepository;

    public function __construct()
    {
        $this->lWeekInventoryRepository = new lWeekInventoryRepository();
    }

    public function create(array $array)
    {
        $this->lWeekInventoryRepository->create($array);
    }

}
