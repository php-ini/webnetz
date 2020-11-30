<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->index();
            $table->string('name', 50)->nullable();
            $table->string('file_name', 100);
            $table->string('file_path', 100);
            $table->string('type', 10)->index();
            $table->string('keywords', 100)->nullable();
            $table->integer('height')->nullable();
            $table->integer('width')->nullable();
            $table->text('exif')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('NULL ON UPDATE CURRENT_TIMESTAMP'))->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('image');
    }
}
