<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public function getCustomer()
    {
        return $this->belongsTo(Customer::class, 'customerId', 'id');
    }

    public function getMerchant()
    {
        return $this->belongsTo(Merchant::class, 'merchantId', 'id');
    }

    public function getAgent()
    {
        return $this->belongsTo(Agent::class, 'agentInfoId', 'id');
    }
}
