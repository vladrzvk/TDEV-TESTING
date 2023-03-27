<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->index('id_folder');
            $table->integer('id_folder')->references('id')->on('folders')->onDelete('cascade');; 
            $table->date('posted');
            $table->binary('image');
            $table->string('lieu');
            $table->json('description');
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
        Schema::dropIfExists('images');
        $table->dropForeign('lists_id_folder_foreign');
$table->dropIndex('lists_id_folder_index');
$table->dropColumn('id_folder');
    }
}
