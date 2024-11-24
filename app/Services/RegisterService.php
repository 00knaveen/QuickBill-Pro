<?php
namespace App\Services;
use App\Interfaces\RegisterInterface;
use App\Repositories\RegisterRepository;

class RegisterService implements RegisterInterface
{
    protected $registerRepository;
    public function __construct() {
       $this->registerRepository = new RegisterRepository();
    }

    public function registerNewUserDetails($request){
    
      return $this->registerRepository->createNewUser($request);
    }
}