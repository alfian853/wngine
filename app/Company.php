<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $primaryKey = "m_id";

	protected $fillable = [
        'm_name', 'm_borndate', 'm_address',
		'm_password', 'm_email', 'm_telp',
    ];

	protected $guarded = ['m_borndate'];

	public $timestamps = false;
}
