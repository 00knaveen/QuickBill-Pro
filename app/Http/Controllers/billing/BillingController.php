<?php

namespace App\Http\Controllers\billing;

use App\Http\Controllers\Controller;
use App\Services\BillingService;
use Illuminate\Http\Request;

class BillingController extends Controller
{
    protected $billingService;
    public function __construct() {
     $this->billingService = new BillingService();
    }
    public function billing(){
        return view('billing.billing');
    }
    public function generateBilling(Request $request){
      
       return $this->billingService->getBillingDetails($request);

    }
}
