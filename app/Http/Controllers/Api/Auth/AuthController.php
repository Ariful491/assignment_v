<?php

namespace App\Http\Controllers\Api\Auth;
use App\Http\Controllers\Api\BaseApiController;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\RegistrationRequest;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends BaseApiController
{
    /**
     * @var UserRepositoryInterface
     */
    protected UserRepositoryInterface $userRepo;

    /**
     * AuthController constructor.
     * @param UserRepositoryInterface $userRepo
     */
    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    /**
     * @param LoginRequest $request
     * @login
     * @return mixed
     */
     public function login(LoginRequest $request){

         $data = $this->userRepo->login($request->all());
         return $this->execute(function () use ($data) {
             return $data;
         }, true);
     }
    /**
     * @param RegistrationRequest $request
     * @registration
     * @return mixed
     */

     public function Register(RegistrationRequest $request): mixed
     {
         $data = $this->userRepo->create($request->all());
         return $this->execute(function () use ($data) {
             return $data;
         }, true);
     }

    /**
     * @param Request $request
     * @Logout
     * @return mixed
     */
     public function logout(Request $request){
        $data = $this->userRepo->logout($request->all());
         return $this->execute(function () use ($data) {
             return $data;
         }, true);

     }

     public function User(){
         $data = $this->userRepo->user();
         return $this->execute(function () use ($data) {
             return $data;
         }, true);
     }
}
