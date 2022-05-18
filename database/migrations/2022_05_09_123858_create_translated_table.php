<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('translated', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('username');
            $table->text('request_text');
            $table->string('command', 3)->nullable();
            $table->text('response_text')->nullable();
            $table->string('language_code',3)->nullable();
            $table->boolean('status')->default(false);
            $table->jsonb('log');
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
        Schema::dropIfExists('translated');
    }
};
