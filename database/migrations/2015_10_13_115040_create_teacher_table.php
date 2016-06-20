<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeacherTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('teachers', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('name');
            $table->string('gender', 6);
            $table->smallInteger('class_id');
            $table->smallInteger('class_type_id');
            $table->string('teacher_reg', 9)->unique();
            $table->string('profile_pix')->default('default.jpg');
            $table->string('address')->nullable();
            $table->string("phone", 25);
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
		Schema::drop('teachers');
	}

}
