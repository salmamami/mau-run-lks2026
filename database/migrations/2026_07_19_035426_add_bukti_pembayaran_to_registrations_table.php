<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBuktiPembayaranToRegistrationsTable extends Migration
{
    public function up()
    {
        Schema::table('registrations', function (Blueprint $table) {
            $table->string('bukti_pembayaran')->nullable()->after('total_bayar');
        });
    }

    public function down()
    {
        Schema::table('registrations', function (Blueprint $table) {
            $table->dropColumn('bukti_pembayaran');
        });
    }
}