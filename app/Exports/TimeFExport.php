<?php

namespace App\Exports;

use App\Models\Time;
use Maatwebsite\Excel\Concerns\FromCollection;

class TimeFExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Time::Where('type', 'FACTURA')->select('id','start', 'end', 'difference')->get();
    }
}
