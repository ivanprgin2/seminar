<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKnjigeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video', function(Blueprint $table)
		{
		$table->increments('id');
		$table->string('naslov', 100);
		$table->integer('zanr_id')->unsigned();
        $table->integer('autor_id')->unsigned();
		$table->integer('godina');
		$table->string('slika', 300);
		$table->timestamps();	
		
		$table->index('zanr_id');
        $table->index('autor_id');
		
		$table->foreign('zanr_id')->references('id')->on('zanr');
        $table->foreign('autor_id')->references('id')->on('autori');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('video');
    }
}
