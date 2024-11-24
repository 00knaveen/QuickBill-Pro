<?php
namespace App;

class AppConst {
    public const PRODUCTS = [[
        'name' => 'Laptop',
        'product_id' => 'PROD001',
        'available_stocks' => 50,
        'price' => 75000.00,
        'tax_percentage' => 20.00,

    ],
    [
        'name' => 'Smartphone',
        'product_id' => 'PROD002',
        'available_stocks' => 100,
        'price' => 25000.00,
        'tax_percentage' => 12.00,
    ],
    [
        'name' => 'Headphones',
        'product_id' => 'PROD003',
        'available_stocks' => 200,
        'price' => 1500.00,
        'tax_percentage' => 5.00,
    ]];
    public const SUCCESS_STATUS_CODE = 200;
    public const NOT_FOUNT_STATUS_CODE=404;
    public const UNAUTHORIZED = 401;
}