<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
	protected $table = 'application';
    protected $fillable = [
         'date_d', 'date_f',
    ];
}
