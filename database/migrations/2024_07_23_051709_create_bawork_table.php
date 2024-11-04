<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBAworkTable extends Migration
{
    public function up()
    {
        Schema::create('bawork', function (Blueprint $table) {
            $table->id();
            $table->string('project_name');
            $table->string('tech');
            $table->string('status');
            $table->string('dev_team');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('business_analyst_name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bawork');
    }
}
