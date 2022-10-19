<?php

namespace Database\Seeders;
use App\Models\Permission;
use App\Models\Product;
use App\Models\Role;
use App\Models\RolePermission;
use App\Models\User;
use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use phpseclib3\Crypt\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Role::insert([
            array('id' => '1','name' => 'Editor','created_at' => NULL,'updated_at' => NULL),
            array('id' => '2','name' => 'Admin','created_at' => NULL,'updated_at' => NULL)
            ]
        );

       User::insert(
                array('id' => '1','role_id' => '2','name' => 'Admin','username' => 'admin','email' => 'admin@gmail.com','phone' => '01995131244','email_verified_at' => NULL,'password' => \Illuminate\Support\Facades\Hash::make(12345678),'remember_token' => NULL,'created_at' => '2022-09-10 14:01:26','updated_at' => '2022-09-10 14:01:26')
        );
       Permission::insert([
           array('id' => '1','name' => 'Product Index','route_name' => 'products.index'),
           array('id' => '2','name' => 'Product Add','route_name' => 'products.create'),
           array('id' => '3','name' => 'Product Store','route_name' => 'products.store'),
           array('id' => '4','name' => 'Product Edit','route_name' => 'products.edit'),
           array('id' => '5','name' => 'Product Update','route_name' => 'products.update'),
           array('id' => '6','name' => 'Product Destroy','route_name' => 'products.destroy')
           ]
       );

       RolePermission::insert([
           array('id' => '1','role_id' => '2','permission_id' => '1','created_at' => NULL,'updated_at' => NULL),
           array('id' => '2','role_id' => '2','permission_id' => '2','created_at' => NULL,'updated_at' => NULL),
           array('id' => '3','role_id' => '2','permission_id' => '3','created_at' => NULL,'updated_at' => NULL),
           array('id' => '4','role_id' => '2','permission_id' => '4','created_at' => NULL,'updated_at' => NULL),
           array('id' => '5','role_id' => '2','permission_id' => '5','created_at' => NULL,'updated_at' => NULL),
           array('id' => '6','role_id' => '2','permission_id' => '6','created_at' => NULL,'updated_at' => NULL),
           array('id' => '10','role_id' => '1','permission_id' => '1','created_at' => NULL,'updated_at' => NULL)]
       );
       Product::insert([
           array('id' => '1','name' => 'Bowl digestive biscuits','type' => '1','price' => '20','size' => '2','litter' => NULL,'color' => '#f3ff47','details' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','photo' => 'uploads/bowl-digestive-biscuits6300.bowl-digestive-biscuits3854.bowl-digestive-biscuits9090.jpeg','status' => '1','created_at' => '2022-09-10 14:24:57','updated_at' => '2022-09-10 14:43:25'),
           array('id' => '2','name' => 'umbrella 1','type' => '1','price' => '200','size' => '1','litter' => NULL,'color' => '#5878f9','details' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.','photo' => 'uploads/umbrella-16267.jpeg','status' => '1','created_at' => '2022-09-10 14:45:51','updated_at' => '2022-09-10 14:45:51'),
           array('id' => '3','name' => 'umbrella 2','type' => '1','price' => '300','size' => '2','litter' => NULL,'color' => '#2dc830','details' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.','photo' => 'uploads/umbrella-25405.jpeg','status' => '1','created_at' => '2022-09-10 14:46:43','updated_at' => '2022-09-10 14:46:43'),
           array('id' => '4','name' => 'umbrella 3','type' => '1','price' => '500','size' => '3','litter' => NULL,'color' => '#10cb7a','details' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.','photo' => 'uploads/umbrella-32020.umbrella-38047.jpeg','status' => '2','created_at' => '2022-09-10 14:47:22','updated_at' => '2022-09-10 14:47:31'),
           array('id' => '5','name' => 'Glass','type' => '1','price' => '600','size' => '3','litter' => NULL,'color' => '#f2f2f2','details' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.','photo' => 'uploads/glass6279.jpeg','status' => '2','created_at' => '2022-09-10 14:49:46','updated_at' => '2022-09-10 14:49:46'),
           array('id' => '6','name' => 'kerosene oil','type' => '2','price' => '200','size' => NULL,'litter' => '2','color' => '#e7dfdf','details' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','photo' => 'uploads/kerosene-oil5152.jpeg','status' => '1','created_at' => '2022-09-10 14:50:47','updated_at' => '2022-09-10 14:50:47'),
           array('id' => '7','name' => 'Distilled   Water','type' => '2','price' => '200','size' => NULL,'litter' => '2','color' => '#f5f5f5','details' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','photo' => 'uploads/distilled-water4257.jpeg','status' => '1','created_at' => '2022-09-10 14:52:35','updated_at' => '2022-09-10 14:52:35'),
           array('id' => '8','name' => 'soybean oil','type' => '2','price' => '2','size' => NULL,'litter' => '500','color' => '#fff475','details' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','photo' => 'uploads/soybean-oil4353.jpeg','status' => '1','created_at' => '2022-09-10 14:53:50','updated_at' => '2022-09-10 14:53:50'),
           array('id' => '9','name' => 'sorisa oil','type' => '2','price' => '300','size' => NULL,'litter' => '1.2','color' => '#777309','details' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','photo' => 'uploads/sorisa-oil1358.jpeg','status' => '1','created_at' => '2022-09-10 14:55:15','updated_at' => '2022-09-10 14:55:15'),
           array('id' => '10','name' => 'Juice','type' => '2','price' => '280','size' => NULL,'litter' => '0.5','color' => '#f5f5f5','details' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','photo' => 'uploads/juice7172.jpeg','status' => '1','created_at' => '2022-09-10 14:56:40','updated_at' => '2022-09-10 14:56:40')
       ]);
    }
}
