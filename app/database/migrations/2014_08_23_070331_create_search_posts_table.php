<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSearchPostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('search_post', function($table) {
            $table->integer('id');
            $table->string('title');
            $table->text('content');
            $table->engine = 'MyISAM';
        });
        DB::statement('ALTER TABLE search_post ADD FULLTEXT search(title, content)');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('search_post', function($table) {
            $table->dropIndex('search');
            $table->drop();
        });
	}
}
