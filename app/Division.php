<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{

	protected $fillable=[
		'code',
		'name',
		'address',
		'postcode',
		'city',
		'state',
	];

	public function members()
    {
      return $this->hasMany(Member::class);
    }
}
