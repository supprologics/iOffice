<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',250);
            $table->string('code',60);
            $table->text('objective');
            $table->string('register_address',250);
            $table->string('postal_code',15);
            $table->string('ds_division',60);
            $table->string('gs_division',45);
            $table->string('landline',15);
            $table->string('mobile',15);
            $table->string('email',80);
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
        Schema::dropIfExists('companies');
    }
}
