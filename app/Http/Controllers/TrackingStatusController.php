<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\AirwayBill;
use Illuminate\Http\Request;
use App\Models\TrackingStatus;

class TrackingStatusController extends Controller
{

    public function create($airway_bill_id)
    {
		$AirwayBill = AirwayBill::find($airway_bill_id);
		return view('tracking.create', compact('AirwayBill'));
    }

    public function store(Request $request)
    {
		$request->merge(['date' => Carbon::parse($request->date)->format('Y-m-d H:i:s')]);

		TrackingStatus::create($this->validateData());
		
		return redirect('airway_bills/' . $request->airway_bill_id)
			->with('status', 'Airway bill status created!')
			->with('bg-color', 'bg-green-500');
    }

    public function show(TrackingStatus $trackingStatus)
    {
        //
    }

    public function edit(TrackingStatus $trackingStatus)
    {
		$AirwayBill = $trackingStatus->airwayBill;
        return view('tracking.edit', compact('trackingStatus', 'AirwayBill'));
    }

    public function update(Request $request, TrackingStatus $trackingStatus)
    {
		$request->merge(['date' => Carbon::parse($request->date)->format('Y-m-d H:i:s')]);
		
		$trackingStatus->update($this->validateData());
		
		return redirect('airway_bills/' . $request->airway_bill_id)
			->with('status', 'Airway bill status updated!')
			->with('bg-color', 'bg-green-500');
	}
	
	public function delete($id)
    {
		$trackingStatus = TrackingStatus::find($id);
		$AirwayBill = $trackingStatus->airwayBill;

		return view('tracking.delete', compact('trackingStatus', 'AirwayBill'));
	}

    public function destroy(TrackingStatus $trackingStatus)
    {
        $trackingStatus->delete();
		
		return redirect('airway_bills/' . $trackingStatus->airwayBill->id)
			->with('status', 'Airway bill status deleted!')
			->with('bg-color', 'bg-red-500');
	}

	protected function validateData()
	{
		return request()->validate([
			'airway_bill_id' => 'required',
			'status' => 'required',
			'location' => 'required',
			'date' => 'required|date_format:Y-m-d H:i:s'
        ]);
	}

	public function track(Request $request)
	{
		$airway_bill = AirwayBill::where('airway_bill', $request->airway_bill)->first();

		$tracking_statuses = $airway_bill ? $airway_bill->TrackingStatuses->sortByDesc('date') : "";

		return view('tracking.tracking-status', compact('airway_bill', 'tracking_statuses'));
	}
}
