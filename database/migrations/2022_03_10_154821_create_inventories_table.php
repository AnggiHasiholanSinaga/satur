<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->string('no_letter')->unique()->nullable();
            $table->string('no_agenda');
            $table->string('from');
            $table->string('subject');
            $table->string('type')->nullable();
            $table->string('status');
            $table->dateTime('letter_date');
            $table->dateTime('implementation_date')->nullable();
            $table->string('implementation_place')->nullable();
            $table->string('implementation_value')->nullable();
            $table->string('implementation_note')->nullable();
            $table->string('file');
            $table->bigInteger('created_by')->nullable();
            $table->string('disposisi_to_kasi_note')->nullable();
            $table->bigInteger('disposisi_to_kasi_by')->nullable();
            $table->dateTime('disposisi_to_kasi_at')->nullable();
            $table->string('disposisi_to_staf_note')->nullable();
            $table->bigInteger('disposisi_to_staf_by')->nullable();
            $table->dateTime('disposisi_to_staf_at')->nullable();
            $table->string('notulen')->nullable();
            $table->bigInteger('notulen_created_by')->nullable();
            $table->dateTime('notulen_created_at')->nullable();
            $table->integer('progress');
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
        Schema::dropIfExists('inventories');
    }
}
