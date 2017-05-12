<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        ////
		Schema::create('Student', function (Blueprint $table) {
            $table->increments('student_id');
            $table->string('Name');
			$table->string('Email');
			$table->integer('Age');
			$table->integer('ContactNo');
			$table->text('Address');
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
        //
		Schema::drop('student');
    }
}
