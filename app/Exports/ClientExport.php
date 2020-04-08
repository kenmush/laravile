<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Client;

class ClientExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Client::select('id','email','url','created_at')->get();
    }

    public function headings(): array

    {
        return [

            'Id',

            'Email',

            'URL',

            'Created At',

        ];

    }
}
