<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('students', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('name');
            $table->string('gender', 10);
            $table->smallInteger('class_id');
            $table->smallInteger('class_type_id');
            $table->string('student_reg', 9)->unique();
            $table->date('dob');
            $table->string('phone', 25);
            $table->string('profile_pix')->default('default.jpg');
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
		Schema::drop('students');
	}

}
