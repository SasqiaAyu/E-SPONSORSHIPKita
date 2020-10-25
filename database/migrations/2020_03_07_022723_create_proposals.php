<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProposals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained();
            $table->string('nama_event')->nullable();
            $table->timestamp('tgl_mulai')->nullable();
            $table->binary('file')->nullable();
            $table->smallInteger('approve')->nullable();
            $table->unsignedBigInteger('company_id');
            $table->dateTime('tgl_approve')->nullable();
            $table->string('file_sumber')->nullable();
            $table->string('file_nama')->nullable();
            $table->string('file_tipe')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proposals');
    }
}
