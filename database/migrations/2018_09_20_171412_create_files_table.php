<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('folder_id')->nullable(false);
            $table->string('current_name')->nullable(false);
            $table->string('previous_name')->nullable(true);
            $table->unsignedInteger('downloads')->default(0);
            $table->unsignedInteger('views')->default(0);
            $table->unsignedBigInteger('created_by')->nullable(false);
            $table->unsignedBigInteger('updated_by')->nullable(true);
            $table->string('path')->nullable(false);
            $table->string('size')->default(0);
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
        Schema::dropIfExists('files');
    }
}
