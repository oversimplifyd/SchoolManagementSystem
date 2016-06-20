<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('results', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('student');
            $table->smallInteger('subjects');
            $table->smallInteger('class');
            $table->smallInteger('type');
            $table->float('score');
            $table->string('session', 9);
            $table->smallInteger('term');
            $table->unique(['student', 'class', 'subjects', 'session', 'term', 'type']);
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
		Schema::drop('results');
	}

}
