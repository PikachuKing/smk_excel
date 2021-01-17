<?php


namespace App\Http\Controllers\SmkVendor;


use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\Importable;

class Import implements ToArray
{
    use Importable;

    public function array(array $rows)
    {
        return $rows;
    }
}
