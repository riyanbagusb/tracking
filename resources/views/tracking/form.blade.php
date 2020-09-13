<div class="flex flex-wrap -mx-3 mb-2">
	<div class="w-full md:w-1/2 px-3">
		<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="airway_bill">Airway Bill</label>
		<input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-primary" type="text" placeholder="Received at Sorting Center" id="airway_bill" value="{{ $AirwayBill->airway_bill }}" required autocomplete="off" disabled>
	</div>
	<input type="hidden" name="airway_bill_id" value="{{ $AirwayBill->id }}">
	<div class="w-full md:w-1/2 px-3">
		<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="OriDes">Origin ➔ Destination</label>
		<input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-primary" type="text" placeholder="Received at Sorting Center" id="OriDes" value="{{$AirwayBill->origin . ' ➔ ' . $AirwayBill->destination }}" required autocomplete="off" disabled>
	</div>
	<div class="w-full px-3">
		<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="status">Status</label>
		<input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-primary" name="status" id="status" type="text" placeholder="Received at Sorting Center" value="{{ $trackingStatus->status ?? old('status') }}" required autocomplete="off" {{ request()->routeIs('tracking_statuses.delete') ? 'disabled':'' }}>
	</div>
	<div class="w-full px-3">
		<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="location">Location</label>
		<input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-primary" name="location" id="location" type="text" placeholder="Bandung - East Java" value="{{ $trackingStatus->location ?? old('location') }}" required autocomplete="off" {{ request()->routeIs('tracking_statuses.delete') ? 'disabled':'' }}>
	</div>
	<div class="w-full px-3 mb-6 md:mb-0">
		<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="date">Date</label>
		@isset($trackingStatus)
		<input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-primary" name="date" id="date" type="date" value="{{ Carbon\Carbon::parse($trackingStatus->date)->format('Y-m-d') ?? old('date') }}" required autocomplete="off" {{ request()->routeIs('tracking_statuses.delete') ? 'disabled':'' }}>
		@else
		<input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-primary" name="date" id="date" type="date" value="{{ old('date') }}" required autocomplete="off" {{ request()->routeIs('tracking_statuses.delete') ? 'disabled':'' }}>
		@endisset
	</div>
	
</div>