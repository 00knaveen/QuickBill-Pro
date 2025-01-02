<?php

namespace App\Http\Controllers\Auth;

use App\AppConst;
use App\Http\Controllers\Controller;
use App\Services\LoginService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected $loginService;
   public function __construct() {
   $this->loginService = new LoginService();   
}

   public function login(Request $request){
      $login = $this->loginService->loginUser($request);
      $result = $login->getData(true);
      if($result['status']== AppConst::SUCCESS_STATUS_CODE){
        return redirect()->route('dashboard')->with('status-success','User Login Successfully.');
      }
      else if($result['status']== AppConst::UNAUTHORIZED){
        return redirect()->route('index')->with('status-error','User Details Not Matched.');
      }
      else{
        return redirect()->route('index')->with('status-error','User Details Not Found Please Sign');
      }
   }
   public function logout(){
    Auth::logout();
    return redirect()->route('index');
   }
}
