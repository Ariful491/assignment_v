<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Product;
use App\Models\RolePermission;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ProductController extends Controller
{
    /**
     * @var ProductRepositoryInterface
     */
    protected ProductRepositoryInterface $productRepo;

    /**
     * ProductController constructor.
     * @param ProductRepositoryInterface $productRepo
     */
    public function __construct(ProductRepositoryInterface $productRepo)
    {

        $this->productRepo = $productRepo;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function index(Request $request){
          if(!Permission::PermissionChecker('products.index')){return abort(404);}
          $data = $request->all();
          $data =  $this->productRepo->getProduct($data);
          return Inertia::render('Product/Index')
              ->with('items',$data);
    }
    public function create(Request $request){
        if(!Permission::PermissionChecker('products.create')){return abort(404);}
        return Inertia::render('Product/AddUpdate');
    }
    public function store(Request $request){
        if(!Permission::PermissionChecker('products.store')){return abort(404);}
        $data = $request->all();
        $data =  $this->productRepo->storeUpdate($data);
        return Redirect::route('products.index')
            ->with('success',$data['success']);

    }
    public function show(Product $product)
    {

    }

    public function edit(Product $product){
        if(!Permission::PermissionChecker('products.edit')){return abort(404);}
        return Inertia::render('Product/Edit')->with('item',$product);
    }
    public function update(Product $product,Request $request){
        if(!Permission::PermissionChecker('products.update')){return abort(404);}
        $data = $request->all();
        if ($request->photo===null){
            $data['photo']= $product->photo;
        }
        $data =  $this->productRepo->storeUpdate($data);
        return Redirect::route('products.index')
            ->with('success',$data['success']);
    }
    public function destroy (Product $product){
        if(!Permission::PermissionChecker('products.destroy')){return abort(404);}
        $data =  $this->productRepo->delete($product);
        return Redirect::route('products.index')
            ->with('success',$data['success']);
    }


}
