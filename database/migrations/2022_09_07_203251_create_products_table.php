<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->tinyInteger('type')->comment('1=Solid-matter, 2=liquid')->default('1');
            $table->double('price',2);
            $table->string('size')->comment('for solid-matter')->nullable();
            $table->string('litter')->comment('for liquid')->nullable();
            $table->string('color');
            $table->longText('details');
            $table->longText('photo');
            $table->tinyInteger('status')->comment('1=active, 2=inactive')->default('2');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
