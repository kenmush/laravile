<?php

use Illuminate\Database\Seeder;

class ColeAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('users')->insert([
            [
                'name' => "Cole",
                'email' => "cole@revealize.com",
                'email_verified_at' => date("Y-m-d H:i:s"),
                'role_id' => 1,
                'password' => bcrypt("Buildthis123"),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        ]);
    }
}
