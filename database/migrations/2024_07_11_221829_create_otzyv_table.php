<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtzyvTable extends Migration
{
    public function up()
    {
        Schema::create('otzyv', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('kniga');
            $table->text('sms');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('otzyv');
    }
}

