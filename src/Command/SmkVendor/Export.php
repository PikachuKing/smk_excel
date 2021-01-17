<?php


namespace App\Http\Controllers\SmkVendor;

use Maatwebsite\Excel\Concerns\FromArray;

class Export implements FromArray
{
    protected $rows;

    public function __construct(array $rows)
    {
        $this->rows = $rows;
    }

    public function array(): array
    {
        return $this->rows;
    }
}
