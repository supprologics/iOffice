<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDirectorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')->references('id')->on('companies');
            $table->string('nic',45);
            $table->string('passport',45)->nullable();
            $table->string('landline',15);
            $table->string('mobile',15);
            $table->string('email',150);
            $table->enum('title',['Dr','Mr','Mrs','Miss','Rev']);
            $table->string('full_name',250);
            $table->string('occupation',150);
            $table->string('ds_division',60);
            $table->string('gs_division',45);
            $table->string('postal_code',15);
            $table->string('residential_address',250);
            $table->string('foreign_address',250)->nullable();
            $table->float('no_of_shares')->default('0')->nullable();
            $table->decimal('norminal_value',10,2)->default('0.00')->nullable();
            $table->integer('flag');
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
        Schema::dropIfExists('directors');
    }
}
