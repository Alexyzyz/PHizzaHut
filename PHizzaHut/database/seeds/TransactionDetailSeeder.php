<?php

use Illuminate\Database\Seeder;

class TransactionDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1
        \Illuminate\Support\Facades\DB::table('transaction_details')->insert([
            'transaction_id'    => 1,
            'pizza_id'          => 1,
            'quantity'          => 1
        ]);

        \Illuminate\Support\Facades\DB::table('transaction_details')->insert([
            'transaction_id'    => 1,
            'pizza_id'          => 2,
            'quantity'          => 1
        ]);

        // 2
        \Illuminate\Support\Facades\DB::table('transaction_details')->insert([
            'transaction_id'    => 2,
            'pizza_id'          => 3,
            'quantity'          => 1
        ]);

        \Illuminate\Support\Facades\DB::table('transaction_details')->insert([
            'transaction_id'    => 2,
            'pizza_id'          => 4,
            'quantity'          => 3
        ]);
    }
}
