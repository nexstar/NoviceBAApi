<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Spider StockDay
|--------------------------------------------------------------------------
|
*/

Route::group(['prefix' => 'SpiderStockDay'], function () {

    // /api/SpiderStockDay/History?CodeGuid=&StockNo=&Data=
    Route::post('History', 'Api\SpiderStockDayController@History')->name('api.WeekInventory.History');
});


/*
|--------------------------------------------------------------------------
| Week Inventory
|--------------------------------------------------------------------------
|
*/
Route::group(['prefix' => 'WeekInventory'], function () {
    // /api/WeekInventory/Status?CodeGuid=&Date=
    Route::get('Status', 'Api\WeekInventoryController@Status')->name('api.WeekInventory.Status');

    // /api/WeekInventory/Insert?CodeGuid=&Date=&Data=
    Route::post('Insert', 'Api\WeekInventoryController@Insert')->name('api.WeekInventory.Insert');
});
