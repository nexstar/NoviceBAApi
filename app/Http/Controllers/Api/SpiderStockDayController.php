<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Service\Info\EveryDayPriceDateService;
use App\Service\Log\lEveryDayPriceService;
use App\Tool\ResponseService;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SpiderStockDayController extends Controller
{

    private $EveryDayPriceDateService;
    private $lEveryDayPriceService;
    private $ResponseService;

    public function __construct()
    {
        $this->EveryDayPriceDateService = new EveryDayPriceDateService();
        $this->lEveryDayPriceService = new lEveryDayPriceService();
        $this->ResponseService = new ResponseService();
    }

    /**
     * @param Request $request
     * @return ResponseFactory|JsonResponse|Response
     */
    public function History(Request $request)
    {
        $CodeGuid = $request['CodeGuid'];
        $Data = json_decode($request['Data'], true);

        if ($CodeGuid === '' || is_null($CodeGuid) || $request['Data'] === '' || is_null($request['Data'])) {
            return $this->ResponseService->HTTP_BAD_REQUEST('Error Request');
        }

        $GetDateByData = str_replace('-', '', $Data['Date']);
        $EveryDayPriceDate = $this->EveryDayPriceDateService->GetInfoByWhere([
            ['CodeGuid', '=', $CodeGuid],
            ['Date', '=', $GetDateByData]
        ]);

        if ($EveryDayPriceDate->isEmpty()) {
            $this->EveryDayPriceDateService->create([
                'Guid' => guid()
                , 'CodeGuid' => $CodeGuid
                , 'Date' => $GetDateByData
            ]);
        }

        $lEveryDayPrice = $this->lEveryDayPriceService->GetInfoByWhere([[
            ['CodeGuid', '=', $CodeGuid],
            ['Date', '=', $GetDateByData]
        ]]);

        if ($lEveryDayPrice->isEmpty()) {
            $this->lEveryDayPriceService->create([
                'Guid' => guid()
                , 'CodeGuid' => $CodeGuid
                , 'Date' => $GetDateByData
                , 'Info' => $Data
            ]);
        }

        return $this->ResponseService->JSON_HTTP_OK('ok');
    }

}
