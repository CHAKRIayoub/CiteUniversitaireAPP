<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Hebergement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hebergement', function (Blueprint $table) {
        
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('chambre_id');
            $table->Date('date_d');
            $table->String('nom_urgence');
            $table->bigInteger('gsm_urgence');
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
        //
    }
}