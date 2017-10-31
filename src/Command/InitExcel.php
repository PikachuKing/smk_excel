<?php

namespace lky_vendor\smk_excel\Command;

use File;
use Illuminate\Console\Command;
use lky_vendor\smk_excel\Temp\RouteTemp;

/**
 * Created by IntelliJ IDEA.
 * User: Yu
 * Date: 2017/10/17 0017
 * Time: 下午 5:31
 */
class InitExcel extends Command
{
    protected $signature = 'excel:init';
    protected $description = 'init import excel to your database';


    public function handle()
    {
        $version = $this->getApplication()->getVersion();
        $route_temp = new RouteTemp();
        if ($version >= 5.3) {
            //拷贝路由
            $route_t=$route_temp->temp();
            $route_path = base_path('routes/web.php');
            $this->write($route_path,$route_t,true);

            //拷贝控制器
            $patt = dirname(__FILE__) .'/SmkVendor/SmkExcel.php';
            $dir =  app_path('Http/Controllers/SmkVendor');
            if(!File::isDirectory($dir)||!File::exists($dir)){
                File::makeDirectory($dir,  $mode = 0777, $recursive = false);
            }
            File::copy($patt, app_path('Http/Controllers/SmkVendor/SmkExcel.php'));

            //拷贝视图
            $patt = dirname(__FILE__) .'/SmkVendor/Index.blade.php';
            $dir =  resource_path('views/SmkVendor');

            if(!File::isDirectory($dir)||!File::exists($dir)){
                File::makeDirectory($dir,  $mode = 0777, $recursive = false);
            }
            $this->line($dir);
            $dir =  resource_path('views/SmkVendor/Excel');
            if(!File::isDirectory($dir)||!File::exists($dir)){
                File::makeDirectory($dir,  $mode = 0777, $recursive = false);
            }
            $this->line($dir);
            File::copy($patt, resource_path('views/SmkVendor/Excel/Index.blade.php'));
        } else {
            $this->error("your laravel version is less than 5.3,please upgrade");
        };
    }

    private function mkdir($path){
        $p = explode('/views',$path);
        $yy = "";
        foreach ($p as $key=>$x){
            if($key==0){
                $yy.=$x.'/views';
            }else{
                $mm = explode('/',$x);
                foreach ($mm as $kk=>$m){
                    if($kk==0){
                        $yy.=$m;
                    }else{
                        $yy.='/'.$m;
                    }
                }
                $this->line($yy);
                if(!File::isDirectory($yy)||!File::exists($yy)){
                    File::makeDirectory($yy,  $mode = 0777, $recursive = false);
                }
            }

        }
    }

    private function write($path,$content,$is_append=false){
        if(!File::exists($path)){
            $this->line("文件不存在");
            return;
        }
        if($is_append){
            File::append($path,$content);
        }else{
            File::put($path,$content);
        }

    }
}
