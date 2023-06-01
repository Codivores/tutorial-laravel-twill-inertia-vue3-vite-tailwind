<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageHomesTables extends Migration
{
    public function up()
    {
        Schema::create('page_homes', function (Blueprint $table) {
            createDefaultTableFields($table, true, false);
        });

        Schema::create('page_home_translations', function (Blueprint $table) {
            createDefaultTranslationsTableFields($table, 'page_home');
        });

        Schema::table('page_home_translations', function (Blueprint $table) {
            $table->after('page_home_id', function ($table) {
                $table->string('title', 200)->nullable();
                $table->string('meta_title', 100)->nullable();
                $table->text('meta_description', 200)->nullable();
            });
        });

        Schema::create('page_home_revisions', function (Blueprint $table) {
            createDefaultRevisionsTableFields($table, 'page_home');
        });
    }

    public function down()
    {
        Schema::dropIfExists('page_home_revisions');
        Schema::dropIfExists('page_home_translations');
        Schema::dropIfExists('page_homes');
    }
}
