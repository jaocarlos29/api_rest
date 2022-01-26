<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plantas', function (Blueprint $table) {
            $table->IntegerIncrements('id');
            $table->foreignId('talhao_id')->constrained('talhaos', 'id')->unsigned();

            $table->integer('ponto_1');
            $table->integer('ponto_2');
            $table->integer('ponto_3');
            $table->integer('ponto_4');
            $table->integer('ponto_5');
            $table->integer('ponto_6');

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plantas');
    }
}
