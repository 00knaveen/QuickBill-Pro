<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\RegisterService;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    protected $registerService;

    public function __construct() {
        $this->registerService = new RegisterService();
    }
    public function register(Request $request){
         $result= $this->registerService->registerNewUserDetails($request);
         if($result){
            return redirect()->route('index')->with('status-success','User Register Successfully.');
         }
         else{
            return redirect()->route('index')->with('status-fail','User not Created');
         }
    }
}
