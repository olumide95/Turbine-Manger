<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeviceInspectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device_inspections', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('device_id');
            $table->longText('check');
            $table->string('D')->nullable();
            $table->string('W')->nullable();
            $table->string('M')->nullable();
            $table->string('Q')->nullable();
            $table->string('S')->nullable();
            $table->longText('CI')->nullable();
            $table->string('HGPI')->nullable();
            $table->string('MI')->nullable();
            $table->string('X')->nullable();
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
        Schema::dropIfExists('device_inspections');
    }
}
