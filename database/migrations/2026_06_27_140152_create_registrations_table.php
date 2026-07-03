<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->foreignId('event_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->string('nama_lengkap');

            $table->string('email');

            $table->string('no_hp');

            $table->enum('jenis_kelamin', [
                'Laki-laki',
                'Perempuan'
            ]);

            $table->enum('ukuran_jersey', [
                'S',
                'M',
                'L',
                'XL',
                'XXL'
            ]);

            $table->string('kode_kupon')->nullable();

            $table->integer('diskon')->default(0);

            $table->unsignedInteger('total_bayar');

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
        Schema::dropIfExists('registrations');
    }
}
