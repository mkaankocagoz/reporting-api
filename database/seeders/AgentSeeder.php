<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AgentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('agents')->insert([
            'customerIp' => '192.168.1.2',
            'customerUserAgent' => 'Agent',
            'merchantIp' => '"127.0.0.1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
