<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{

	protected $fillable=[
		'code',
		'name',
		'description',

	];

	//protected $table = 'groups'; to specific the table name

	public function members(){
    return $this -> belongsToMany(Member::class);
  }

}
