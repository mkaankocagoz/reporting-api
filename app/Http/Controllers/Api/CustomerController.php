<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;

class CustomerController extends Controller
{
    public function index(Request $request){

        $request->validate([
            'transactionId' => 'required',
        ]);

        return Transaction::where('transactionId', $request->all())->first()->getCustomer;
    }
}
