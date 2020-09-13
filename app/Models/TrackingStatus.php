<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrackingStatus extends Model
{
	use HasFactory;
	
	protected $guarded = [];

	public function AirwayBill()
	{
		return $this->belongsTo('App\Models\AirwayBill');
	}
}
