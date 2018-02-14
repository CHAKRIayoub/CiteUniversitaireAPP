<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDossiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dossiers', function (Blueprint $table) {
                            $table->increments('id');
                            $table->integer('user_id');
                            $table->integer('ville_id');
                            $table->integer('cne');
                            $table->String('cin');
                            $table->String('lieu_naissance');
                            $table->Date('date_naissance');
                            $table->String('genre');
                            $table->String('nom');
                            $table->String('prenom');
                            $table->String('adresse');
                            $table->String('telephone');
                            $table->integer('annee_bac');
                            $table->String('mention');
                            $table->String('cycle');
                            $table->String('etablissement');
                            $table->String('handicape');
                            $table->String('maladie');
                            $table->String('nom_pere');
                            $table->String('cin_pere');
                            $table->String('nom_mere');
                            $table->String('cin_mere');                           
                            $table->integer('revenue');
                            $table->integer('nb_enfants');
                            $table->float('note_dossier');
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
        Schema::drop('dossiers');
    }
}
