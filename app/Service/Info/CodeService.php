<?php
namespace App\Service\Info;

use App\Repository\Info\CodeRepository;
use Illuminate\Support\Collection;

class CodeService
{

    private $CodeRepository;

    public function __construct()
    {
        $this->CodeRepository = new CodeRepository();
    }

    public function GetInfoByAll()
    {
        return $this->CodeRepository->GetInfoByAll();
    }

    public function GetInfoByWhere($array):Collection
    {
        return $this->CodeRepository->GetInfoByWhere($array);
    }

    public function GetInfoByFind($CodeGuid)
    {
        return $this->CodeRepository->GetInfoByFind($CodeGuid);
    }

}
