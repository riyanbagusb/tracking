<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\AirwayBill;
use Illuminate\Http\Request;

class AirwayBillController extends Controller
{
    public function index()
    {
        $airway_bills = AirwayBill::get();

        return view('airway_bill.index', compact('airway_bills'));
    }

    public function create()
    {
		$customers = Customer::get();

        return view('airway_bill.create', compact('customers'));
    }

    public function store(Request $request)
    {
        AirwayBill::create($this->validateData());
		
		return redirect('airway_bills')
			->with('status', 'Airway bill created!')
			->with('bg-color', 'bg-green-500');
    }

    public function show(AirwayBill $airwayBill)
    {
		$tracking_statuses = $airwayBill->TrackingStatuses->sortByDesc('date');
		
        return view('airway_bill.show', compact('airwayBill', 'tracking_statuses'));
    }

    public function edit(AirwayBill $airwayBill)
    {
		$customers = Customer::get();

        return view('airway_bill.edit', compact('airwayBill', 'customers'));
    }

    public function update(Request $request, AirwayBill $airwayBill)
    {
        $airwayBill->update($this->validateData());
		
		return redirect('airway_bills')
			->with('status', 'Airway bill updated!')
			->with('bg-color', 'bg-green-500');
	}
	
	public function delete($id)
    {
		$customers = Customer::get();
		$airwayBill = AirwayBill::find($id);

		return view('airway_bill.delete', compact('airwayBill', 'customers'));
	}

    public function destroy(AirwayBill $airwayBill)
    {
		$airwayBill->delete();
		
		return redirect('airway_bills')
			->with('status', 'Customer deleted!')
			->with('bg-color', 'bg-red-500');
	}

	protected function validateData()
	{
		return request()->validate([
			'customer_id' => 'required',
			'airway_bill' => 'required',
			'origin' => 'required',
			'destination' => 'required'
        ]);
	}
}
