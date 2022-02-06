<?php

namespace App\Exports;

use App\Models\Time;
use Maatwebsite\Excel\Concerns\FromCollection;

class TimeBExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Time::Where('type', 'BUSQUEDA')->select('id','start', 'end', 'difference')->get();
    }
}
