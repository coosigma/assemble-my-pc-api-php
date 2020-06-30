<?php

namespace App\Http\Controllers;

use App\Exports\ComponentsExport;
use App\Imports\ComponentsImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DataIOController extends Controller
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function importExportView()
    {
        return view('import');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function export()
    {
        return Excel::download(new ComponentsExport, 'pc-components.xlsx');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function import()
    {
        Excel::import(new ComponentsImport, request()->file('file'));

        return back();
    }
}
