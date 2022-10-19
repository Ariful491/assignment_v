<?php
namespace App\Repositories;
use App\Repositories\Interfaces\UserRepositoryInterface;
 use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{
    public function create($data): array
    {
         $data['password'] = Hash::make($data['password']);
         $data = User::create($data);
         $success['token'] =  $data->createToken('assignment')->accessToken;
         $success['name'] =  $data->name;
         return $success;
     }

    public function  login($data): array
    {
        /*if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
            $client  = Auth::user();
            $success['token'] =  $client->createToken('assignment')-> accessToken;
            $success['name'] =  $client->name;
            return $success;
        }
        else{
            $success['error'] = "Unauthorised";
            $success['status'] = 401;
            return $success;

        }*/
        $user = User::where('email',$data['login'])
            ->orWhere('phone',$data['login'])
            ->orWhere('username',$data['login'])
            ->first();
        if(!$user || !Hash::check($data['password'],  $user->password)){
            $success['error'] = "Unauthorised";
            $success['status'] = 401;
            return $success;
        }
        else{
            Auth::login($user);
            $user  = Auth::user();
            $success['token'] =  $user->createToken('assignment')-> accessToken;
            $success['name'] =  $user->name;
            return $success;

        }

    }
    public function logout($data): array
    {
        if (Auth::check()) {
            $token = Auth::user()->token();
            $token->revoke();
            $success['message'] = 'Logout successfully';
            return $success;
        }
        else{
            $success['message'] = 'Logout successfully';
            $success['status'] = 401;
            return $success;
        }

    }

    public function user(): ?\Illuminate\Contracts\Auth\Authenticatable
    {
        return Auth::user();
    }



}
