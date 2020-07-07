<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTurbineMaintainanceLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turbine_maintainance_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('turbine_id');
            $table->string('inspection_type');
            $table->string('proposed_hours');
            $table->string('actual_hours')->nullable();
            $table->string('actual_date')->nullable();
            $table->string('total_fails')->nullable();
            $table->longText('remark')->nullable();
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
        Schema::dropIfExists('turbine_maintainance_logs');
    }
}
