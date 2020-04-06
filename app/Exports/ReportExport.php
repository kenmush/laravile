<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Admin\UserReport;
use DB;

class ReportExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = UserReport::get();
        $data = DB::table('user_reports as p')
        ->select('p.name','users.email','p.report_link','p.created_at')
        ->join('users','p.user_id','users.id')
        ->get();
        return $data;
    }

    public function headings(): array

    {
        return [

            'Name',

            'User Email',

            'Report Link',

            'Created At',

        ];

    }
}
