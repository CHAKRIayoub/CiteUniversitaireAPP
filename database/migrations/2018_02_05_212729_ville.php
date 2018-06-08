<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Ville extends Migration
{
    
    public function up()
    {
        Schema::create('villes', function (Blueprint $table) {
            $table->increments('id');
            $table->String('ville');
            $table->Integer('distance');
        });

    }

    
    public function down()
    {
        Schema::drop('villes');
    }
}
