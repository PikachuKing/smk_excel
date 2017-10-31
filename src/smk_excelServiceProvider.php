<?php

namespace lky_vendor\smk_excel;

use Illuminate\Support\ServiceProvider;

class smk_excelServiceProvider extends ServiceProvider
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
