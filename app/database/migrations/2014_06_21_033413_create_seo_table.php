<?php

use Illuminate\Database\Migrations\Migration;

class CreateSeoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('seo',function($table){
			$table->increments('id');
			$table->integer('seo_type');
			$table->integer('seo_id');
			$table->string('title',100);
			$table->text('description',150);
			$table->string('keyword',150);
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
		Schema::drop('seo');
	}

}