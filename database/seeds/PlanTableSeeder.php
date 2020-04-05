<?php

use Illuminate\Database\Seeder;

class PlanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plans')->truncate();
        DB::table('plans')->insert([
            [
                'title' => "PLAN 1",
                'books' => null,
                'clients' => null,
                'users' => 5,
                'report' => 100,
                'price' => 50,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'title' => "PLAN 2",
                'books' => null,
                'clients' => null,
                'users' => null,
                'report' => 500,
                'price' => 125,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'title' => "PLAN 3",
                'books' => null,
                'clients' => null,
                'users' => null,
                'report' => 1000,
                'price' => 125,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        ]);
    }
}
