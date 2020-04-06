<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\User;
use Maatwebsite\Excel\Concerns\WithHeadings;
class UsertExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = User::select('name','email','created_at')->get();
        return $data;
    }


    public function headings(): array

    {
        return [

            'Name',

            'User Email',

            'Created At',

        ];

    }
}
