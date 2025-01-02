<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\AppConst;
use Illuminate\Support\Facades\Log;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = AppConst::PRODUCTS;
        
        if ($products && count($products) > 0) {
            foreach ($products as $product) {
                $data = $this->checkProduct($product);
                 if ($data && $data !== null) {
                    $this->UpdateProduct($product);
                } else {
                    $this->CreateProduct($product);
                }
            }
        } else {
            echo "Products not Found";
        }
    }

    public function checkProduct($product)
    {
        try {
            return DB::table('products')
                ->where('product_id', $product['product_id'])
                ->first();
        } catch (\Exception $e) {
            Log::info([
                'function' => 'checkProduct',
                'Message' => $e->getMessage(),
                'line' => $e->getLine(),
            ]);
            return null;
        }
    }

    public function CreateProduct($product)
    {
        try {
            DB::table('products')->insert([
                'product_id' => $product['product_id'],
                'name' => $product['name'],
                'available_stocks' => $product['available_stocks'],
                'price' => $product['price'],
                'tax_percentage' => $product['tax_percentage'],
                'created_at' => now(),
            ]);
        } catch (\Exception $e) {
            Log::info([
                'function' => 'CreateProduct',
                'Message' => $e->getMessage(),
                'line' => $e->getLine(),
            ]);
        }
    }

    public function UpdateProduct($product)
    {
        try {
            DB::table('products')
                ->where('product_id', $product['product_id'])
                ->update([
                    'name' => $product['name'],
                    'available_stocks' => $product['available_stocks'],
                    'price' => $product['price'],
                    'tax_percentage' => $product['tax_percentage'],
                    'updated_at' => now(),
                ]);
        } catch (\Exception $e) {
            Log::info([
                'function' => 'UpdateProduct',
                'Message' => $e->getMessage(),
                'line' => $e->getLine(),
            ]);
        }
    }
}
