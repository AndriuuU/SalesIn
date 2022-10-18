<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->unsignedBigIncrements('id');
            $table->text('title');
            $table->text('description');
            $table->date('date_max');
            $table->integer('num_candidates');
            $table->unsignedBigIncrements('cicle_id');
            $table->foreign('cicle_id')->references('id')->on('cicles');
            $table->boolean('deleted')->default(0);
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offers');
    }
}
