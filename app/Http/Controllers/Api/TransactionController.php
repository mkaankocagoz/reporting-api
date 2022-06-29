<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index(Request $request){

        $request->validate([
            'transactionId' => 'required'
        ]);

        $transaction = Transaction::where('transactionId', $request->transactionId)->first();
        $response['fx']['merchant'] = [
            'originalAmount' => $transaction->amount,
            'originalCurrency' => $transaction->currency
        ];   
        $response['customerInfo'] = $transaction->getCustomer; 
        $response['merchant'] = $transaction->getMerchant->name; 
        $transaction->push('agent', $transaction->getAgent);
        $response['transaction']['merchant'] = $transaction; 

        return $response;
    }

    public function report(Request $request){
        $request->validate([
            'fromDate' => 'required',
            'toDate' => 'required',
        ]);

        $query = DB::table('transactions')
             ->select(DB::raw('count(id) as count, sum(amount) as total, currency'))
             ->whereBetween('created_at', [$request->fromDate, $request->toDate]);
            if(isset($request->merchant)){
                $query = $query->where('merchantId', $request->merchant);
            }
            if(isset($request->acquirer)){
                $query = $query->where('acquirerId', $request->acquirer);
            }
        $transaction_report = $query->groupBy('currency')->get();

        $response = ['status' => 'APPROVED', 'response' => $transaction_report];     
        return $response;     
    }

    public function list(Request $request){

        $query = DB::table('transactions')
            ->select('transactions.*', 'customers.email', 'customers.number', 'customers.billingFirstName', 'customers.billingLastName', 
                    'merchants.id as m_id', 'merchants.name as m_name', 
                    'acquirers.id as a_id', 'acquirers.name as a_name', 'acquirers.code as a_code', 'acquirers.type as a_type');
            if(isset($request->fromDate)){
                $query = $query->where('transactions.created_at', '>', $request->fromDate);
            }
            if(isset($request->toDate)){
                $query = $query->where('transactions.created_at', '<', $request->toDate);
            }
            if(isset($request->merchant)){
                $query = $query->where('transactions.merchantId', $request->merchant);
            }
            if(isset($request->acquirer)){
                $query = $query->where('transactions.acquirerId', $request->acquirer);
            }
            if(isset($request->status)){
                $query = $query->where('transactions.status', $request->status);
            }
            if(isset($request->operation)){
                $query = $query->where('transactions.operation', $request->operation);
            }
            if(isset($request->paymentMethod)){
                $query = $query->where('transactions.paymentMethod', $request->paymentMethod);
            }
            if(isset($request->filterField)){
                $filterFields = [
                    'transactions.transactionId' => 'Transaction UUID', 
                    'transactions.referenceNo' => 'Reference No', 
                    'transactions.customData' => 'Custom Data',
                    'customers.email' => 'Customer Email',
                    'customers.number' => 'Card PAN',
                ];
                $query = $query->where(array_search($request->filterField, $filterFields), $request->filterValue);
            }
            if(isset($request->errorCode)){
                $query = $query->where('transactions.errorCode', $request->errorCode);
            }
            $query = $query->leftJoin('customers', 'customers.id', '=', 'transactions.customerId')
                            ->leftJoin('merchants', 'merchants.id', '=', 'transactions.merchantId')
                            ->leftJoin('acquirers', 'acquirers.id', '=', 'transactions.acquirerId');

        $transaction_list = $query->take(50)->get();

        $response = [
            'per_page' => 50,
            'current_page' => 1,
            'next_page_url' => "http://localhost/api/v3/transaction/list/?page=2",
            'prev_page_url' => '',
            'from' => 1,
            'to' => 50,
        ];
        
        foreach($transaction_list as $key=>$item){
            $response['data'][$key]['fx']['merchant'] = [
                'originalAmount' => $item->amount,
                'originalCurrency' => $item->currency
            ];
            $response['data'][$key]['customerInfo'] = [
                'number' => $item->number,
                'email' => $item->email,
                'billingFirstName' => $item->billingFirstName,
                'billingLastName' => $item->billingLastName
            ];
            $response['data'][$key]['merchant'] = [
                'id' => $item->m_id,
                'name' => $item->m_name,
            ];
            $response['data'][$key]['ipn'] = [
                'received' => true
            ];
            $response['data'][$key]['transaction']['merchant'] = [
                'referenceNo' => $item->referenceNo,
                'status' => $item->status,
                'operation' => $item->operation,
                'message' => $item->message,
                'created_at' => $item->created_at,
                'transactionId' => $item->transactionId
            ];
            $response['data'][$key]['acquirer'] = [
                'id' => $item->a_id,
                'name' => $item->a_name,
                'code' => $item->a_code,
                'type' => $item->a_type
            ];
            $response['data'][$key]['refundable'] = ($item->refundable) ? true : false;
        }

        return $response;
    }

    public function show($page_number=1){
        $skip = ($page_number-1)*50;
        $transactions = Transaction::skip($skip)->take(50)->get();

        foreach($transactions as $key=>$transaction){
            $response['data'][$key] = [
                'originalAmount' => $transaction->amount,
                'originalCurrency' => $transaction->currency,
                'merchantName'  => $transaction->getMerchant->name,
                'customerEmail'  => $transaction->getCustomer->email,
            ];
        }

        return view('transaction_table', compact('response'));
    }
}
