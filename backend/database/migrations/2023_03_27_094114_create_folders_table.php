<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoldersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('folders', function (Blueprint $table) {
            $table->increments('id');
            $table->index('id_owner');
            $table->integer('id_owner')->references('id')->on('users')->onDelete('cascade');; 
            $table->date('creation');
            $table->string('description');
            $table->json('access');
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
        Schema::dropIfExists('folders');
        $table->dropForeign('lists_id_owner_foreign');
        $table->dropIndex('lists_id_owner_index');
        $table->dropColumn('id_owner');
    }
}
