<?php

namespace App\Interfaces;

Interface ProductInterface{
    public function getUserProduct(string $userId);
    public function addNewProduct(string $userId,$request);
}

