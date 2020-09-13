<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AirwayBill extends Model
{
	use HasFactory;

	protected $guarded = [];
	
	public function TrackingStatuses()
    {
        return $this->hasMany('App\Models\TrackingStatus');
	}
}
