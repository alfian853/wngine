<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticable;


class Company extends Authenticable
{
    protected $primaryKey = "c_id";
    protected $table = 'company';

	protected $fillable = [
        'c_name', 'c_address',
		'password', 'email', 'c_telp','c_image','remember_token'
    ];

	public $timestamps = false;
}
