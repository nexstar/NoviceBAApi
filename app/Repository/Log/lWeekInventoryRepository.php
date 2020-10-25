<?php


namespace App\Repository\Log;


use App\Model\Log\lWeekInventory;

class lWeekInventoryRepository
{

    private $lWeekInventory;

    public function __construct()
    {
        $this->lWeekInventory = new lWeekInventory();
    }

    public function create(array $array)
    {
        $this->lWeekInventory::create($array);
    }

}
