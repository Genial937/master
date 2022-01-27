<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cands', function (Blueprint $table) {
            $table->id();
            $table->string('cand_name')->nullable();
            $table->string('cid')->nullable();
            $table->string('cycle')->nullable();
            $table->string('state')->nullable();
            $table->string('party')->nullable();
            $table->string('chamber')->nullable();
            $table->string('first_elected')->nullable();
            $table->string('next_election')->nullable();
            $table->string('total')->nullable();
            $table->string('spent')->nullable();
            $table->string('cash_on_hand')->nullable();
            $table->string('debt')->nullable();
            $table->string('origin')->nullable();
            $table->string('source')->nullable();
            $table->string('last_updated')->nullable();
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
        Schema::dropIfExists('cands');
    }
}

