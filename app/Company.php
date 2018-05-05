<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticable;


class Company extends Authenticable
{
    protected $primaryKey = "m_id";
    protected $table = 'company';

	protected $fillable = [
        'c_name', 'c_address',
		'password', 'email', 'c_telp','c_image'
    ];

	protected $guarded = ['m_borndate'];

	public $timestamps = false;
}
