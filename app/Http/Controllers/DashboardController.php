<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\AirwayBill;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
	{
		$data['customers'] = Customer::count();
		$data['airway_bills'] = AirwayBill::count();
		return view('dashboard.dashboard', compact('data'));
	}
}
