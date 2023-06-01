<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageHomesTables extends Migration
{
    public function up()
    {
        Schema::create('page_homes', function (Blueprint $table) {
            // this will create an id, a "published" column, and soft delete and timestamps columns
            createDefaultTableFields($table);
            
            // add those 2 columns to enable publication timeframe fields (you can use publish_start_date only if you don't need to provide the ability to specify an end date)
            // $table->timestamp('publish_start_date')->nullable();
            // $table->timestamp('publish_end_date')->nullable();
        });

        Schema::create('page_home_translations', function (Blueprint $table) {
            createDefaultTranslationsTableFields($table, 'page_home');
            $table->string('title', 200)->nullable();
            $table->text('description')->nullable();
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
