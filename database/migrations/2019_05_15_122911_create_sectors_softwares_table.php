<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectorsSoftwaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sectors_softwares', function (Blueprint $table) {
            $table->unsignedBigInteger('sector_id');
            $table->unsignedBigInteger('software_id');
            $table->foreign('sector_id')
                ->references('id')->on('sectors')
                ->onDelete('cascade');
            $table->foreign('software_id')
                ->references('id')->on('softwares')
                ->onDelete('cascade');
            $table->primary(['sector_id', 'software_id']);
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
        Schema::dropIfExists('sectors_softwares');
    }
}
