<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('name');
            $table->string('nip')->nullable()->default(null);
            // $table->unsignedBigInteger('position_id');
            $table->foreignId('position_id')
                ->constrained('master_positions')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreignId('division_id')
                ->constrained('master_divisions')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('password');
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
        Schema::dropIfExists('accounts');
    }
}
