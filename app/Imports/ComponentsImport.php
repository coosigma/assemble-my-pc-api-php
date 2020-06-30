<?php

namespace App\Imports;

use App\Component;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ComponentsImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Component([
            'category' => $row['category'],
            'name' => $row['name'],
            'price' => $row['price'],
            'speed_g' => $row['speedghz'],
            'threads' => $row['threads'],
            'cores' => $row['cores'],
            'cache_m' => $row['cachem'],
            'manufacturer' => $row['manufacturer'],
            'supplier' => $row['supplier'],
        ]);
    }
}
