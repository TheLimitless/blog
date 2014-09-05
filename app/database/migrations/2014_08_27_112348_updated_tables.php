<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatedTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('posts', function($table) {
            $table->dropColumn('beginning');
        });
        Schema::table('search_post', function($table) {
            $table->text('beginning');
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
        Schema::table('posts', function($table) {
            $table->string('beginning');
        });
        Schema::table('search_post', function($table) {
            $table->dropColumn('beginning');
            $table->dropTimestamps();
        });
	}
}
