<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatesAndLga extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('states', function (Blueprint $table) {
            $table->increments('id');
            $table->string('state_name');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
        
        
        Schema::create('lgas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lga_name');
            $table->unsignedInteger('state_id');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
            
            
            $table->foreign('state_id')->references('id')->on('states')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('states');
        Schema::dropIfExists('lgas');
    }
}
