<?php
namespace App\Services;
use App\Interfaces\BillingInterface;
use App\Repositories\BillingRepository;

class BillingService implements BillingInterface{

    protected $billingRepository;
    public function __construct() {
        $this->billingRepository = new BillingRepository();
    }
    public function getBillingDetails($request){
       return $this->billingRepository->retrievingBillingDetails($request);
      }
}