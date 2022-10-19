<?php
namespace App\Repositories\Interfaces;


interface UserRepositoryInterface {

    public function create($data);
    public function login($data);
    public function logout($data);
    public function user();

}
