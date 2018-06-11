<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTamscoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        
        Schema::create('schools', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sch_name');
            $table->string('short_name');
            $table->string('address')->nullable();
            $table->string('url')->nullable();
            $table->string('sub_domain')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
        
        Schema::create('sub_schools', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('school_id');
            $table->string('sub_name');
            $table->text('address')->nullable();
            $table->string('url')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
            
            
            $table->foreign('school_id')
                    ->references('id')
                    ->on('schools')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            
        });
        
        Schema::create('colleges', function (Blueprint $table) {
            $table->increments('id');
            $table->string('college_name');
            $table->string('college_title');
            $table->string('college_code');
            $table->string('college_email');
            $table->string('dean_email');
            $table->unsignedInteger('subschool_id');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
            
            $table->foreign('subschool_id')
                    ->references('id')
                    ->on('sub_schools')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
        });
        
        Schema::create('departments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('col_id');
            $table->string('dept_code', 4)->nullable();
            $table->string('dept_name');
            $table->string('dept_email')->nullable();
            $table->string('dept_url')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
            
            
            $table->foreign('col_id')
                    ->references('id')
                    ->on('colleges')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
        });
        
        
        
        Schema::create('programmes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('dept_id');
            $table->string('prog_name');
            $table->string('prog_code', 4)->nullable();
            $table->string('prog_email')->nullable();
            $table->string('prog_url')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
            
            
            $table->foreign('dept_id')
                    ->references('id')
                    ->on('departments')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
        });
        
        
        Schema::create('courses', function (Blueprint $table) {
            $table->unsignedInteger('dept_id');
            $table->string('course_code');
            $table->string('course_title');
            $table->text('cource_content')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
            
            
            $table->foreign('dept_id')
                    ->references('id')
                    ->on('departments')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
        });
        
        
        Schema::create('sessions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sesion_name');
            $table->unsignedInteger('subschool_id');
            $table->enum('semester', ['first', 'second'])->default('first');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->enum('result_upload', ['active', 'inactive'])->default('inactive');
            $table->enum('admission', ['active', 'inactive'])->default('inactive');
            $table->enum('exam_pass', ['active', 'inactive'])->default('inactive');
            $table->enum('course_reg', ['active', 'inactive'])->default('inactive');
            
            $table->timestamps();
            
            $table->foreign('subschool_id')
                    ->references('id')
                    ->on('sub_schools')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('programmes');
        Schema::dropIfExists('departments');
        Schema::dropIfExists('colleges');
        Schema::dropIfExists('sub_schools');
        Schema::dropIfExists('schools');
    }
}
