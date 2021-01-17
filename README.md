## Smk_Excel
用户导入导出Excel,要求laravel版本最低:5.1


# 引入方法
###
1.1:首先引入laravel Excel包(注意依次执行):
``` bash
composer require lky_vendor/smk_excel dev-master;
```
### 
1.2:在config/app.php的provider数组中添加: 
``` bash
Maatwebsite\Excel\ExcelServiceProvider::class,
lky_vendor\smk_excel\excelServiceProvider::class,
```

###
1.3:在config/app.php的aliases数组中添加:
``` bash
'Excel' => Maatwebsite\Excel\Facades\Excel::class,
'cURL' => anlutro\cURL\Laravel\cURL::class,
```
###
1.4:执行以下命令配置你的excel:
``` bash
php artisan vendor:publish --provider="Maatwebsite\Excel\ExcelServiceProvider";
php artisan excel:init
```
   'excel' => [
            'driver' => 'local',
            'root' => public_path('excel/exports/'),
        ],
# 使用方法
**一.导入**

1:你需要自定义一个路由返回你需要导入的数组:
``` bash
 $p = array();
        $p[] = array(
            'name' => 'name',//字段名称
            'type' => array( //字段需要的验证,目前只有 string,int,需要的可以加
                'string'
            ),
            'self_verify' => '',//如果需要自己验证,此处就填写你自己验证的地址,你会收到一个id和一个值来验证
            'can_be_null' => false,//这个字段是否能为空
            'chinese' => "姓名", //字段显示的中文名
            'preg_err_msg' => '正则表达式验证不通过',//如果验证不通过显示的中文
            'preg' => '',//可以支持正则表达式,如果为空则不填写
            'id' => 1 //数组中唯一的ID,这个ID是你自己分配的,必须要是唯一
        );
 return response()->json($p);//最后把这个json返回出来
```

2:你需要自定义另外一个路由存入导入的数据:<br>

注意:Excel数据是一行一行传递给你这个路由的
``` bash
$val = $req->input('id');//此处的ID为你定义的唯一ID
```
**二.导出**

你需要路由'smk_vender_excel_export_index'这个上面去，然后你还传递两个参数

1.你自定义得返回数据得路由，参数名字：route，返回得数据格式如下


       $title = array(
           '学号','姓名','手机号码','性别','院系','专业名称'
       );

       $data[] = $title;
       $data[] = array(
           '10011','张三','15708442244','男','计算机学院','软件技术'
       );
       $data[] = array(
           '10012','李四','15708442245','男','计算机学院','软件技术'
       );
       $data1[] = $title;
       $data1[] = array(
           '10011','张三','15708442244','女','计算机学院','软件技术'
       );
       $data1[] = array(
           '10012','李四','15708442245','女','计算机学院','软件技术'
       );
       $p ['一班'] = $data;
       $p ['二班'] = $data1;
       return response()->json($p);
       
2.参数名字more，意思是是否导出多个sheet表格。

       route('smk_vender_excel_export_index',['route'=>'TestGetData','more'=>md5(1)])
       
上面就是传递参数的形式，more用md5转换一次
