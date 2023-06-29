<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPostsAddSlug extends Migration
{
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('slug');
        });
    }

    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn(['slug']);
        });
    }
}
