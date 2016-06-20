<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsboardTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('newsboards', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('title');
            $table->text('news');
            $table->smallInteger('publish')->default('0');
            $table->string('featured_image');
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
		Schema::drop('newsboards');
	}

}
