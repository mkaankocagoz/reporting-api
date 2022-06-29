<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            'number' => 'Mergen Bank',
            'expiryMonth' => '6',
            'expiryYear' => '2022',
            'email' => 'michael@gmail.com',
            'birthday' => '1986-03-20 12:09:10',
            'billingFirstName' => 'Michael',
            'billingLastName' => 'Kara',
            'billingAddress1' => 'test adress',
            'billingCity' => 'Antalya',
            'billingPostcode' => '070707',
            'billingCountry' => 'TR',
            'shippingFirstName' => 'Michael',
            'shippingLastName' => 'Kara',
            'shippingAddress1' => 'test adress',
            'shippingCity' => 'Antalya',
            'shippingPostcode' => '070707',
            'shippingCountry' => 'TR',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
