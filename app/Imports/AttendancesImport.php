<?php

namespace App\Imports;

use App\Attendance;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Carbon\Carbon;
use DateTime;
use App\Imports\PhpOffice\PhpSpreadsheet\Shared\Date;

class AttendancesImport implements ToModel, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Attendance([
            'employee_id' => $row[0],
            #'visited' => $row[1],
            #'campus_id' => $row[2],
            #'from' => $row[3],
            #'to' => $row[4]
            'visited' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[1])->format('Y-m-d'),
            'campus_id' => $row[2],
            'from' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[3])->format('H:i'),
            'to' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[4])->format('H:i')
        ]);
    }

    public function rules(): array
    {
        return [
            /*'1' => Rule::in(['patrick@maatwebsite.nl']),

             // Above is alias for as it always validates in batches
             '*.1' => Rule::in(['patrick@maatwebsite.nl']),
             
             // Can also use callback validation rules
             '0' => function($attribute, $value, $onFailure) {
                  if ($value !== 'Patrick Brouwers') {
                       $onFailure('Name is not Patrick Brouwers');
                  }
              }*/
        ];
    }
}
