<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShapesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shapes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('unit')->nullable();
            $table->text('video_url')->nullable();
            $table->unsignedSmallInteger('flexible')->default(false);

            $table->unsignedBigInteger('elem_id')->nullable();
            $table->unsignedSmallInteger('deep')->nullable();
            $table->unsignedSmallInteger('crystal_id')->nullable();
            $table->unsignedSmallInteger('step')->nullable();
            $table->unsignedSmallInteger('difficult')->nullable();
            $table->unsignedSmallInteger('level')->nullable();

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
        Schema::dropIfExists('shapes');
    }
}
