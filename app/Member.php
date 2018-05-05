<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticable;


class Member extends Authenticable
{
    protected $primaryKey = "m_id";

	protected $fillable = [
        'm_name', 'm_borndate', 'm_address',
		'password', 'email', 'm_telp',
    ];

	protected $guarded = ['m_borndate'];

	public $timestamps = false;
}
