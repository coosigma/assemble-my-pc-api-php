<?php

namespace App\Exports;

use App\Component;
use Maatwebsite\Excel\Concerns\FromCollection;

class ComponentsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Component::all();
    }
}
