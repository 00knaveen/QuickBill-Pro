<?php
namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BillingRepository{
    public function retrievingBillingDetails($request)
    {
        try {
            $billingDetails = [];
            $totalWithoutTax = 0;
            $totalTax = 0;
            $grandTotal = 0;
            if (count($request->products) > 0) {
                foreach ($request->products as $product) {
                    $result = DB::table('products')
                        ->where('product_id', $product['product_id'])
                        ->first();
    
                    if ($result && $result != null) {
                        $productBilling = $this->calculateBilling($result, $product);
                        $totalWithoutTax += $productBilling['subtotal'];
                        $totalTax += $productBilling['tax_amount'];
                        $grandTotal += $productBilling['total'];
                        $billingDetails[] = $productBilling;
                    }
                }
            }
            $finalBilling = [
                'email' => $request->email,
                'products' => $billingDetails,
                'summary' => [
                    'total_without_tax' => round($totalWithoutTax, 2),
                    'total_tax' => round($totalTax, 2),
                    'grand_total' => round($grandTotal, 2),
                ]
            ];
    
            return response()->json([
                'status' => 'success',
                'billing_details' => $finalBilling
            ]);
        } catch (\Exception $e) {
            Log::info([
                'function' => 'retrievingBillingDetails',
                'message' => $e->getMessage(),
                'line' => $e->getLine()
            ]);
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong while processing the billing.'
            ]);
        }
    }
    
    public function calculateBilling($result, $product)
    {
        try {
            $quantity = (int)$product['quantity'];
            $pricePerUnit = $result->price;
            $taxPercentage = $result->tax_percentage;
    
            $subtotal = $pricePerUnit * $quantity;
            $taxAmount = ($subtotal * $taxPercentage) / 100;
            $total = $subtotal + $taxAmount;
            return [
                'product_id' => $product['product_id'],
                'quantity' => $quantity,
                'price_per_unit' => $pricePerUnit,
                'subtotal' => round($subtotal, 2),
                'tax_percentage' => $taxPercentage,
                'tax_amount' => round($taxAmount, 2),
                'total' => round($total, 2),
            ];
        } catch (\Exception $e) {
            Log::info([
                'function' => 'calculateBilling',
                'message' => $e->getMessage(),
                'line' => $e->getLine()
            ]);
            return null;
        }
    }
    
}