<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable=[
		'membership_no',
		'nric',
		'name',
    'gender',
		'address',
		'postcode',
		'city',
		'state',
    'phone',
    'division_id',
	];

  public function groups(){
    return $this -> belongsToMany(Group::class);
  }

  public function division(){
    return $this -> belongsTo(Division::class);
  }
}
