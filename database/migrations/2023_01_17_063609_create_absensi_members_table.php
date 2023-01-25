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
        Schema::create('absensi_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kloter')->references('id')->on('kloters')->cascadeOnDelete();
            $table->foreignId('id_member')->references('id')->on('members')->cascadeOnDelete();
            $table->string('1');
            $table->string('2');
            $table->string('3');
            $table->string('4');
            $table->string('5');
            $table->string('6');
            $table->string('7');
            $table->string('8');
            $table->string('9');
            $table->string('10');
            $table->string('mid_test');
            $table->string('final_test');
            $table->string('avg');
            $table->string('score');
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
        Schema::dropIfExists('absensi_members');
    }
};
