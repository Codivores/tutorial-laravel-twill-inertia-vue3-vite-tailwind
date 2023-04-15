<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageContentsTables extends Migration
{
    public function up()
    {
        Schema::create('page_contents', function (Blueprint $table) {
            createDefaultTableFields($table);
        });

        Schema::table('page_contents', function (Blueprint $table) {
            $table->after('id', function ($table) {
                $table->integer('position')->unsigned()->nullable();
            });
        });

        Schema::create('page_content_translations', function (Blueprint $table) {
            createDefaultTranslationsTableFields($table, 'page_content');
        });

        Schema::table('page_content_translations', function (Blueprint $table) {
            $table->after('page_content_id', function ($table) {
                $table->string('title', 200)->nullable();
                $table->string('meta_title', 100)->nullable();
                $table->text('meta_description', 200)->nullable();
            });
        });

        Schema::create('page_content_slugs', function (Blueprint $table) {
            createDefaultSlugsTableFields($table, 'page_content');
        });

        Schema::create('page_content_revisions', function (Blueprint $table) {
            createDefaultRevisionsTableFields($table, 'page_content');
        });
    }

    public function down()
    {
        Schema::dropIfExists('page_content_revisions');
        Schema::dropIfExists('page_content_translations');
        Schema::dropIfExists('page_content_slugs');
        Schema::dropIfExists('page_contents');
    }
}
