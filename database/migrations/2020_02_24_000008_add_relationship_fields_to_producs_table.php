<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProducsTable extends Migration
{
    public function up()
    {
        Schema::table('producs', function (Blueprint $table) {
            $table->unsignedInteger('author_id');
            $table->foreign('author_id', 'author_fk_1046410')->references('id')->on('users');
        });
    }
}
