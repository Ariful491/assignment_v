<?php
namespace App\Repositories;
use App\Models\Product;
use Illuminate\Support\Str;
use  Image;
use App\Repositories\Interfaces\ProductRepositoryInterface;


class ProductRepository implements ProductRepositoryInterface
{

    public function getProduct($data)
    {
        isset($data['sort'])?$sort=$data['sort']:$sort='desc';
        $products = Product::orderBy('id',$sort);
        if(isset($data['status']) && !empty($data['status'])){
            $products->where('status',$data['status']);
        }
        if(isset($data['price']) && !empty($data['price'])){
            $products->whereBetween('price',[0,$data['price']]);
        }
        return  $products->paginate(5);
    }

    public function storeUpdate($data)
    {
        if(isset($data['photo']) && !empty($data['photo'])){
            $file = explode(';',$data['photo']);
            $file = explode('/',$file[0]);
            $file_Extension  = end($file);
            $slug = Str::slug($data['name']).rand(1111,9999);
            $file_name = $slug.'.'.$file_Extension;
            Image::make($data['photo'])->save(public_path('uploads/').$file_name);
            $data['photo']  = 'uploads/'.$file_name;
        }
        if(isset($data['id']) && !empty($data['id'])){ $id=$data['id']; }else{ $id=null;}
           Product::updateOrCreate(['id' => $id ] ,$data);
        if(isset($data['id'])){
            $sucess["success"] = "updated success";
        }else{
            $sucess["success"] = "created success";
        }
        return $sucess;

    }
    public function delete($data)
    {
        $data->delete();
        $sucess["success"] = "Deleted success";
        return $sucess;
    }
}
