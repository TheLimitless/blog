<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSearchTriggers extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // triggers for searching in the mirror MyISAM table
        DB::unprepared('
            DROP TRIGGER IF EXISTS post_insert;
            CREATE TRIGGER post_insert AFTER INSERT ON posts
            FOR EACH ROW BEGIN
                INSERT INTO search_post (id, title, content) VALUES (
                    NEW.id,
                    NEW.title,
                    NEW.content
                );
            END;');

        DB::unprepared('
            DROP TRIGGER IF EXISTS post_update;
            CREATE TRIGGER post_update AFTER UPDATE ON posts
            FOR EACH ROW BEGIN
                DELETE FROM search_post WHERE id=NEW.id;
                INSERT INTO search_post (id, title, content) VALUES (
                    NEW.id,
                    NEW.title,
                    NEW.content
                );
            END;');

        DB::unprepared('
            DROP TRIGGER IF EXISTS delete_post;
            CREATE TRIGGER delete_post AFTER DELETE ON posts
            FOR EACH ROW BEGIN
                DELETE FROM search_post WHERE id=OLD.id;
            END;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER post_insert');
        DB::unprepared('DROP TRIGGER post_update');
        DB::unprepared('DROP TRIGGER post_delete');
    }

}
