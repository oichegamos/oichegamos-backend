<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateImageAddLink extends Migration
{
    public function up()
    {
        Schema::table('images', function (Blueprint $table) {
            $table->string('image_url');
        });
    }

    public function down()
    {
        Schema::table('images', function (Blueprint $table) {
            $table->dropColumn(['image_url']);
        });
    }
}
