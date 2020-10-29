<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Service\Info\ThreeMajorDateService;
use App\Service\Log\lThreeMajorPriceService;
use App\Tool\ResponseService;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ThreeMajorController extends Controller
{

    private $ResponseService;
    private $ThreeMajorDateService;
    private $lThreeMajorPriceService;

    public function __construct()
    {
        $this->ThreeMajorDateService = new ThreeMajorDateService();
        $this->lThreeMajorPriceService = new lThreeMajorPriceService();
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

        $GetDateByData = str_replace('/','',$Data['Date']);
        $EveryDayPriceDate = $this->ThreeMajorDateService->GetInfoByWhere([
            ['CodeGuid', '=', $CodeGuid],
            ['Date', '=', $GetDateByData]
        ]);

        if ($EveryDayPriceDate->isEmpty()) {
            $this->ThreeMajorDateService->create([
                'Guid' => guid()
                , 'CodeGuid' => $CodeGuid
                , 'Date' => $GetDateByData
            ]);
        }

        $lEveryDayPrice = $this->lThreeMajorPriceService->GetInfoByWhere([
            ['CodeGuid', '=', $CodeGuid],
            ['Date', '=', $GetDateByData]
        ]);

        if ($lEveryDayPrice->isEmpty()) {
            $this->lThreeMajorPriceService->create([
                'Guid' => guid()
                , 'CodeGuid' => $CodeGuid
                , 'Date' => $GetDateByData
                , 'Info' => $Data
            ]);
        }

        return $this->ResponseService->JSON_HTTP_OK('ok');
    }
}
