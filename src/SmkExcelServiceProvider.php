<?php

namespace LkyVendor\SmkExcel;

use Illuminate\Support\ServiceProvider;
use Blade;
use LkyVendor\SmkExcel\Command\InitExcel;

class SmkExcelServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands(array(
            InitExcel::class
        ));
    }
}
