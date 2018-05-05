<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistrationsCompany extends Model
{
	protected $table = 'registrationsCompany';
	protected $fillable = [
      'rgc_email', 'rgc_name','rgc_token','rgc_address','rgc_password','rgc_telp'
  ];
	public $timestamps = false;
}
