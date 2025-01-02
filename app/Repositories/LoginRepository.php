<?php
namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LoginRepository{

    public function getUserDetails(string $email){
        try{
            return DB::table('users')
            ->where('email',$email)
            ->first();
        }
        catch(\Exception $e){
            Log::info([
                'function'=>'getUserDetails',
                'Message'=>$e->getMessage(),
                'Line'=>$e->getLine()
            ]);
        }
    }
}