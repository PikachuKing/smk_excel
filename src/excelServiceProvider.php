<?php

namespace lky_vendor\smk_excel;

use Illuminate\Support\ServiceProvider;
use lky_vendor\smk_excel\Command\InitExcel;

class excelServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        //
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
