<?php
namespace App\Services;

use App\AppConst;
use App\Interfaces\LoginInterface;
use App\Repositories\LoginRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginService implements LoginInterface{

    protected $loginRepository;
    public function __construct() {
        $this->loginRepository = new LoginRepository();
    }
    public function loginUser($request){
        $userDetails = $this->loginRepository->getUserDetails($request['email']);
       
        if($userDetails && $userDetails !== null){
            if(Hash::check($request['password'],$userDetails->password)){
              
               if(Auth::guard('web')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){
               return response()->json([
                 'status'=>AppConst::SUCCESS_STATUS_CODE,
                'message'=>'User Login Success'
              ]);
            }
            }
            else{
                return response()->json([
                    'status'=>AppConst::UNAUTHORIZED,
                    'message'=>'User Details Incorrect',
                ]);
            }
        }
        else{
             return response()->json([
                'status'=>AppConst::NOT_FOUNT_STATUS_CODE,
                'Message'=>'User Is Not Found'
             ]);
        }
    }
}