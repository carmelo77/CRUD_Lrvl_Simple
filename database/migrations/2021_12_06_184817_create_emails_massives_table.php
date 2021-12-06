<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailsMassivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emails_massives', function (Blueprint $table) {
            $table->id();
            $table->string('from');
            $table->string('subject');
            $table->string('to');
            $table->string('content');
            $table->enum('status', ['send', 'nosend'])->default('nosend');
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
        Schema::dropIfExists('emails_massives');
    }
}
