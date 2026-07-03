<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();

            $table->string('nama_event');

            $table->foreignId('event_type_id')
                  ->constrained('event_types')
                  ->cascadeOnDelete();
            
            $table->foreignId('city_id')
                  ->constrained('cities')
                  ->cascadeOnDelete();

            $table->date('tanggal');

            $table->unsignedInteger('harga');

            $table->unsignedInteger('kuota');

            $table->text('deskripsi');

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
        Schema::dropIfExists('events');
    }
}
