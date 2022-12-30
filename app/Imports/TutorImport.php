<?php

namespace App\Imports;

use App\Models\Tutor;
use Maatwebsite\Excel\Concerns\ToModel;

class TutorImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Tutor([
            'nama_tutor'     => $row[0],
        ]);
    }
}
