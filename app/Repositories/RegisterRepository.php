<?php
namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RegisterRepository{

    public function createNewUser($request){
        try{

            return DB::table('users')->
            insert([
                'name'=>$request['name'],
                'email'=>$request['email'],
                'password'=>bcrypt($request['password'])
            ]);
        }
        catch(\Exception $e){
            Log::info([
                'function'=>'createNewUser',
                'Message'=>$e->getMessage(),
                'line'=>$e->getLine()
            ]);
            return false;
        }
    }
}