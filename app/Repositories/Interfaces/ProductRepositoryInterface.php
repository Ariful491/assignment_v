<?php
namespace App\Repositories\Interfaces;


interface ProductRepositoryInterface {

    public function getProduct($data);
    public function storeUpdate($data);
    public function delete($data);

}
