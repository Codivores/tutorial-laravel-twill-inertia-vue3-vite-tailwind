<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePagesTables extends Migration
{
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            createDefaultTableFields($table);
        });

        Schema::table('pages', function (Blueprint $table) {
            $table->integer('position')->unsigned()->nullable()->after('id');
        });

        Schema::create('page_translations', function (Blueprint $table) {
            createDefaultTranslationsTableFields($table, 'page');
        });

        Schema::table('page_translations', function (Blueprint $table) {
            $table->string('title', 1000)->nullable()->after('page_id');
            $table->string('meta_title', 100)->nullable()->after('title');
            $table->text('meta_description', 200)->nullable()->after('meta_title');
        });

        Schema::create('page_slugs', function (Blueprint $table) {
            createDefaultSlugsTableFields($table, 'page');
        });

        Schema::create('page_revisions', function (Blueprint $table) {
            createDefaultRevisionsTableFields($table, 'page');
        });
    }

    public function down()
    {
        Schema::dropIfExists('page_revisions');
        Schema::dropIfExists('page_translations');
        Schema::dropIfExists('page_slugs');
        Schema::dropIfExists('pages');
    }
}
