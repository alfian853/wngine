<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class registrationsCompany extends Model
{
	protected $fillable = [
        'rgc_email', 'rgc_name','rgc_token','rgc_address','rgc_password','rgc_telp'
    ];
	public $timestamps = false;
}
