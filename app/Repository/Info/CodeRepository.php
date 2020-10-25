<?php


namespace App\Repository\Info;


use App\Model\Info\Code;

class CodeRepository
{

    private $Code;

    public function __construct()
    {
        $this->Code = new Code();
    }

    public function GetInfoByAll()
    {
        return $this->Code::all();
    }

    public function GetInfoByWhere($array)
    {
        return $this->Code::where($array)->get();
    }

}
