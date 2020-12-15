<?php

use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('transactions')->insert([
            'user_id'   => 2,
            'datetime'  => now()
        ]);

        \Illuminate\Support\Facades\DB::table('transactions')->insert([
            'user_id'   => 3,
            'datetime'  => now()
        ]);
    }
}
