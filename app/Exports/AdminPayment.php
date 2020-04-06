<?php

namespace App\Exports;

use App\Models\PaymentHistoryLog;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use DB;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AdminPayment implements WithBatchInserts,WithHeadings, FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = DB::table('payment_history_logs as p')
        ->select('p.amount','p.transaction_id','users.email','p.status','p.created_at')
        ->join('users','p.user_id','users.id')
        ->get();

       return $data;
    }

    public function startCell(): string
    {
        return 'A2';
    }

    public function headings(): array

    {

        return [

            'Amount(Cent)',

            'Transaction',

            'User Email',

            'Status',

            'Created At',

        ];

    }
    public function batchSize(): int
    {
        return 100;
    }
}
