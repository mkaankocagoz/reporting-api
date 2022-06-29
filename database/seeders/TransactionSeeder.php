<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transactions')->insert(
            [
                'merchantId' => 1,
                'acquirerId' => 1,
                'customerId' => 1,
                'amount' => 100,
                'currency' => 'EUR',
                'status' => 'APPROVED',
                'operation' => '3DAUTH',
                'referenceNo' => 'api_560a4a9314208',
                'message' => 'Auth3D is APPROVED',
                'transactionId' => '2827-1443515082-1',
                'refundable' => 1,
                'channel' => 'API',
                'agentInfoId' => 1,
                'fxTransactionId' => 1,
                'acquirerTransactionId' => 1,
                'paymentMethod' => 'CREDITCARD',
                'code' => '00',
                'errorCode' => '"Invalid Transaction',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'merchantId' => 1,
                'acquirerId' => 1,
                'customerId' => 1,
                'amount' => 200,
                'currency' => 'EUR',
                'status' => 'WAITING',
                'operation' => '3DAUTH',
                'referenceNo' => 'api_560a4a9314208',
                'message' => 'Auth3D is APPROVED',
                'transactionId' => '2827-1443515082-2',
                'refundable' => 1,
                'channel' => 'API',
                'agentInfoId' => 1,
                'fxTransactionId' => 1,
                'acquirerTransactionId' => 1,
                'paymentMethod' => 'CREDITCARD',
                'code' => '00',
                'errorCode' => '"Invalid Transaction',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'merchantId' => 1,
                'acquirerId' => 1,
                'customerId' => 1,
                'amount' => 100,
                'currency' => 'USD',
                'status' => 'APPROVED',
                'operation' => '3DAUTH',
                'referenceNo' => 'api_560a4a9314208',
                'message' => 'Auth3D is APPROVED',
                'transactionId' => '2827-1443515082-3',
                'refundable' => 1,
                'channel' => 'API',
                'agentInfoId' => 1,
                'fxTransactionId' => 1,
                'acquirerTransactionId' => 1,
                'paymentMethod' => 'CREDITCARD',
                'code' => '00',        
                'errorCode' => '"Invalid Transaction',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')    
            ]
        );
    }
}
