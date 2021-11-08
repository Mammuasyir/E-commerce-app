<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPriceToDetailpesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::table('detailpesanans', function (Blueprint $table) {
                $table->integer('Price')->nullable()->after('jumlah_pesanan');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('_detailpesanans', function (Blueprint $table) {
            $table->dropColumn('Price');
        });
    }
}
