<?php
namespace App\Services;

use App\AppConst;
use App\Interfaces\ProductInterface;
use App\Repositories\ProductRepository;

class ProductService implements ProductInterface{

    protected $productRepository;
    public function __construct() {
        $this->productRepository = new ProductRepository();
    }
    public function getUserProduct(string $userId){
      return $this->productRepository->getProductDetails($userId);
    }
    public function addNewProduct(string $userId,$request){
        return $this->productRepository->createNewProductList($userId,$request);
    }
    public function checkProduct(string $productId){
        $data= $this->productRepository->checkExsitingProductId($productId);
        if($data && $data != null){
            return response()->json([
                'status'=>AppConst::SUCCESS_STATUS_CODE,
                'Message'=>'Product Id is available'
            ]);
        }
        else{
            return response()->json([
                'status'=>AppConst::NOT_FOUNT_STATUS_CODE,
                'Message'=>'There is no Product Details'
            ]);
        }
    }
}