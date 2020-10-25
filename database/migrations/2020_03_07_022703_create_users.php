<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

class CreateUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('alamat');
            $table->string('telp');
            $table->string('foto_sumber')->nullable();
            $table->string('foto_nama')->nullable();
            $table->string('foto_tipe')->nullable();
            $table->string('password');
            $table->smallInteger('jenis_user');
            $table->string('email');
            $table->smallInteger('approve')->nullable();
            $table->unsignedBigInteger('approve_user_id')->nullable();
            $table->foreign('approve_user_id')->references('id')->on('users')->nullable();
            $table->timestamp('tgl_approve')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
        DB::table('users')->insert([
            'nama' => 'esponsorship',
            'alamat' => '',
            'telp' => '',
            'password' => Hash::make('admin123'),
            'jenis_user' => '1',
            'email' => 'esponsorship@gmail.com',
            'approve' => '1',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
