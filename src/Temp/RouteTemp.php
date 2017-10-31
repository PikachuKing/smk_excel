<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 2017/10/19 0019
 * Time: 下午 3:21
 */

namespace lky_vendor\smk_excel\Temp;


class RouteTemp
{

    public function temp()
    {
        $route="Route::group(['namespace'=>'SmkVendor'],function(){
    Route::any('importexcel/index','SmkExcel@index')->name('smk_vender_excel_index');
    Route::any('importexcel/subexcel','SmkExcel@sub_excel')->name('smk_vender_excel_sub_excel');
    Route::any('importexcel/resolution','SmkExcel@resolution')->name('smk_vender_excel_resolution');
});";
        return $route;
    }
}
