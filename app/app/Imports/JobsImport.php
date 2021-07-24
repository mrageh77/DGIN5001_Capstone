<?php

namespace App\Imports;

use App\Models\Job;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithUpserts;

class JobsImport implements ToModel, WithUpserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Job([
            'title' => $row[0],
            'description' => $row[1],
            'excerpt' => $row[2],
            'skills' => $row[3],
        ]);
    }


    public function uniqueBy()
    {
        return 'title';
    }


}
