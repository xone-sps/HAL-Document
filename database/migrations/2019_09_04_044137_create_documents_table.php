<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->longText('description')->nullable();
            $table->string('image')->default('logo.png')->nullable();
            $table->string('file');
            $table->enum('status',['enable','disabled'])->default('enable');
            $table->integer('size')->nullable();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->bigInteger('doctype_id')->unsigned()->nullable();
            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('doctype_id')->references('id')->on('document_types')->onUpdate('cascade')->onDelete('cascade');
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
    Schema::table('documents', function ($table) {
        $table->dropForeign('user_id');
        $table->dropForeign('doctype_id');
    });
     Schema::dropIfExists('documents');
 
    }
}
