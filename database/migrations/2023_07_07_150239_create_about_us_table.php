<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutUsTable extends Migration
{
    public function up()
    {
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->longText('description');

            $table->foreignId('image_id')->nullable()->constrained();

            $table->timestamps();
        });
        \DB::statement($this->addDefaultValue());
    }

    public function down()
    {
        Schema::dropIfExists('about_us');
    }

    private function addDefaultValue()
    {
        return <<<SQL
            INSERT INTO about_us
                VALUES (DEFAULT, 'sobre nós', null, CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP());
            SQL;
    }
}
