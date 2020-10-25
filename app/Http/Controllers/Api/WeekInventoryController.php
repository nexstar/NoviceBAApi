<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Service\Info\CodeService;
use App\Service\Info\WeekInventoryIsWorkService;
use App\Service\Log\lWeekInventoryService;
use App\Tool\ResponseService;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class WeekInventoryController extends Controller
{

    private $lWeekInventoryService;
    private $WeekInventoryIsWorkService;
    private $CodeService;
    private $ResponseService;

    public function __construct()
    {
        $this->CodeService = new CodeService();
        $this->lWeekInventoryService = new lWeekInventoryService();
        $this->WeekInventoryIsWorkService = new WeekInventoryIsWorkService();
        $this->ResponseService = new ResponseService();
    }

    /**
     * 確定已完成當天 集保中心
     * @param Request $request
     * @return ResponseFactory|JsonResponse|Response
     */
    public function Status(Request $request)
    {
        $CodeGuid = $request['CodeGuid'];
        $Date = $request['Date'];

        if ($CodeGuid === '' || is_null($CodeGuid) || $Date === '' || is_null($Date)) {
            return $this->ResponseService->HTTP_BAD_REQUEST('Error Request');
        }

        $WeekInventoryIsWork = $this->WeekInventoryIsWorkService->GetInfoByWhere([
            ['CodeGuid', '=', $CodeGuid],
            ['Date', '=', $Date]
        ]);

        if (!$WeekInventoryIsWork->isEmpty()) {
            $WeekInventoryIsWork = $WeekInventoryIsWork->first();
            $WeekInventoryIsWork->delete();
        }

        return $this->ResponseService->JSON_HTTP_OK('ok');
    }

    /**
     * 新增集保中心資料
     * @param Request $request
     * @return ResponseFactory|JsonResponse|Response
     */
    public function Insert(Request $request)
    {
        $CodeGuid = $request['CodeGuid'];
        $Date = $request['Date'];
        $Data = json_decode($request['Data'], true);

        if ($CodeGuid === '' || is_null($CodeGuid) || $Date === '' || is_null($Date) ||
            $Data === '' || is_null($Data)
        ) {
            return $this->ResponseService->HTTP_BAD_REQUEST('Error Request');
        }

        $this->lWeekInventoryService->create([
            'Guid' => guid()
            , 'CodeGuid' => $CodeGuid
            , 'Date' => $Date
            , 'Info' => $Data
        ]);

        return $this->ResponseService->JSON_HTTP_OK('ok');
    }
}
