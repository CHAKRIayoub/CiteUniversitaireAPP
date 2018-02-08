<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Regle extends Model
{
    protected $fillable = [
			'nom',
			'factor'
	];
}
