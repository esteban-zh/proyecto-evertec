<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->string('picture');
            $table->unsignedInteger('price');
            $table->boolean('enable')->default(true);
            $table->timestamps();
        });
        // Schema::table('flights', function (Blueprint $table) {
        //     $table->softDeletes();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
        // Schema::table('flights', function (Blueprint $table) {
        //     $table->dropSoftDeletes();
        // });
    }
}
