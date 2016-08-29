<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('code')->default('Default');
            $table->integer('seq');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('name');
            $table->double('price',10,2)->default('0.00');
            $table->integer('seq');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('pricing_rules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('customer_code');
            $table->string('item_code');
            $table->string('name');
            $table->string('operator');
            $table->string('quantity');
            $table->double('special_price',10,2);
            $table->integer('seq');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('checkouts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id');
            $table->integer('pricing_rules_id');
            $table->string('item_code');
            $table->integer('quantity');
            $table->double('price',10,2);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('items');
        Schema::drop('customers');
        Schema::drop('pricing_rules');
        Schema::drop('checkouts');
    }
}
