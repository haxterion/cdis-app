<?php

namespace App\Exports;

use App\Models\Tutor;
use Maatwebsite\Excel\Concerns\FromCollection;

class TutorExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Tutor::all();
    }
}
