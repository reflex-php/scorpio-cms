<?php

use Kalnoy\Nestedset\NestedSet;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('uri')->unique()->index();
            $table->string('route_name')->unique()->nullable();
            $table->integer('theme_id')->nullable()->unsigned();
            $table->longtext('body');
            $table->longtext('excerpt')->nullable();
            $table->boolean('active')->default(1);
            $table->boolean('default')->default(0);
    
            // Order values
            NestedSet::columns($table);

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
        Schema::drop('pages');
    }
}
