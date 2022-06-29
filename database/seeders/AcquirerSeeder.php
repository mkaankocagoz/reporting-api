<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AcquirerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('acquirers')->insert([
            'name' => 'Mergen Bank',
            'code' => 'MB',
            'type' => 'CREDITCARD',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
