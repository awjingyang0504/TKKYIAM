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
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('group_id')->constrained()->references('id')->on('groups')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('status_id')->constrained()->references('id')->on('statuses')->onDelete('cascade')->onUpdate('cascade');
            $table->string('participant_name');
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
        Schema::dropIfExists('participants');
    }
};
