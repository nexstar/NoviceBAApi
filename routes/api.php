<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Stock
|--------------------------------------------------------------------------
|
*/

Route::group(['prefix' => 'ThreeMajor'], function () {
    // /api/ThreeMajor/History?CodeGuid=&Data=
    Route::get('History', 'Api\ThreeMajorController@History')->name('api.ThreeMajor.History');
});

/*
|--------------------------------------------------------------------------
| Stock
|--------------------------------------------------------------------------
|
*/

Route::group(['prefix' => 'StockInfo'], function () {
    Route::get('End', 'Api\StockInfoController@End')->name('api.StockInfo.End');
});

/*
|--------------------------------------------------------------------------
| Spider StockDay
|--------------------------------------------------------------------------
|
*/
Route::group(['prefix' => 'SpiderStockDay'], function () {
    Route::get('History', 'Api\SpiderStockDayController@History')->name('api.WeekInventory.History');
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
