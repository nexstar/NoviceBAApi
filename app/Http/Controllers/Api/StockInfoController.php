<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Service\Info\CodeService;
use App\Service\Info\EveryDayPriceDateService;
use App\Service\Log\lStockEndService;
use App\Service\Log\lWeekInventoryService;
use App\Tool\ResponseService;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class StockInfoController extends Controller
{

    private $ResponseService;
    private $lStockEndService;
    private $CodeService;
    private $EveryDayPriceDateService;
    private $lWeekInventoryService;

    public function __construct()
    {
        $this->ResponseService = new ResponseService();
        $this->lStockEndService = new lStockEndService();
        $this->CodeService = new CodeService();
        $this->EveryDayPriceDateService = new EveryDayPriceDateService();
        $this->lWeekInventoryService = new lWeekInventoryService();
    }

    /**
     * @param Request $request
     * @return ResponseFactory|Response
     */
    public function End(Request $request)
    {
        $CodeGuid = $request['CodeGuid'];
//        if ($CodeGuid === '' || is_null($CodeGuid))
//            return $this->ResponseService->HTTP_BAD_REQUEST('Error Request');
//
//        $CodeGuid = trim($CodeGuid);
//        Log::info($CodeGuid);
//        $Code = $this->CodeService->GetInfoByFind($CodeGuid);
//
//        if (is_null($Code))
//            return $this->ResponseService->HTTP_BAD_REQUEST('Stock no exist');
//
//        $this->EveryDayPriceDateService->Delete($CodeGuid);
//        $this->lWeekInventoryService->Delete($CodeGuid);
//
//        $this->lStockEndService->create(['Guid' => guid(), 'Code' => $Code['Code']]);
//        $Code->delete();
        return $this->ResponseService->HTTP_OK('ok');
    }

}
