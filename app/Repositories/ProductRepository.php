<?php
namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductRepository{

    public function getProductDetails(string $userId){
        try{
            return DB::table('products')
            ->where('user_id',$userId)
            ->get();
        }
        catch(\Exception $e){
            Log::info([
                'function'=>'getProductDetails',
                'message'=>$e->getMessage(),
                'Line'=>$e->getLine(),
            ]);
            return [];
        }
    }
    public function createNewProductList(string $userId,$request){
        try{

            return DB::table('products')
            ->insert([
                'name'=>$request['name'],
                'user_id'=>$userId,
                'product_id'=>$request['product_id'],
                'available_stocks'=>$request['available_stocks'],
                'price'=>$request['price'],
                'tax_percentage'=>$request['tax_percentage'],
                'created_at'=>now()
            ]);
        }
        catch(\Exception $e){
            Log::info([
                'function'=>'createNewProductList',
                'Message'=>$e->getMessage(),
                'line'=>$e->getLine(),
            ]);
        }
    }
    public function checkExsitingProductId(string $productId){
        try{
            return DB::table('products')
            ->where('product_id',$productId)
            ->first();
        }
        catch(\Exception $e){
            Log::info([
                'function'=>'checkExsitingProductId',
                'message'=>$e->getMessage(),
                'line'=>$e->getLine()
            ]);
            return null;
        }
    }
}