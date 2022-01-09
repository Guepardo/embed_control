<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStreamPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stream_points', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->string('cdn_host')->nullable(false);
            $table->string('ingest_host')->nullable(false);
            $table->string('stream_key')->nullable(false);
            $table->string('stream_name')->nullable(false);
            $table->boolean('active')->default(true);
            $table->boolean('priority')->nullable(false);

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
        Schema::dropIfExists('stream_points');
    }
}
