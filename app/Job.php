<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
		'name', 'description', 'company_id',
		'upload_date', 'finish_date', 'document',
	];

	public $timestamps = false;
}
