<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    protected $productService;
    public function __construct() {
       $this->productService = new ProductService();
    }

    public function dashboard(){
        return view('billing-dashboard.dashboard',array(
            'products'=>$this->productService->getUserProduct(Auth::user()->id)
        ));
    }
    public function checkProductId(Request $request){
       return $this->productService->checkProduct($request->productId);
    }
    public function addProduct(Request $request){
       $result = $this->productService->addNewProduct(Auth::user()->id,$request);
       if($result){
        return redirect()->route('dashboard')->with('status-success','Product Added Successfully.');
       }
       else{
        return redirect()->route('dashboard')->with('status-error','Product Not Added Please Try Again.');
       }
    }
}
