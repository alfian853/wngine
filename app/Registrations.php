<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class registrations extends Model
{
	protected $fillable = [
        'rg_email', 'rg_name','rg_token','rg_borndate','rg_address','rg_password','rg_telp'
    ];
	public $timestamps = false;
}
