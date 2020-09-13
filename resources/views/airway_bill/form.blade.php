<div class="flex flex-wrap -mx-3 mb-2">
	<div class="w-full px-3 mb-3">
		<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="customer_id">
			Customer
		</label>
		<div class="relative">
			<select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="customer_id" id="customer_id" {{ request()->routeIs('airway_bills.delete') ? 'disabled':'' }}>
			@foreach ($customers as $customer)
			<option value="{{ $customer->id }}" {{ ($airwayBill->customer_id ?? old('customer_id')) == $customer->id ? 'selected':'' }}>{{ $customer->name }}</option>
			@endforeach
			</select>
			<div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
				<svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
			</div>
		</div>
	</div>
	<div class="w-full px-3">
		<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="airway_bill">Airway Bill</label>
		<input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-primary" name="airway_bill" id="airway_bill" type="text" placeholder="Airway Bill Number" value="{{ $airwayBill->airway_bill ?? old('airway_bill') }}" required autocomplete="off" {{ request()->routeIs('airway_bills.delete') ? 'disabled':'' }}>
	</div>
	<div class="w-full md:w-1/2 px-3">
		<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="origin">Origin</label>
		<input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-primary" name="origin" id="origin" type="text" placeholder="Tokyo - Japan" value="{{ $airwayBill->origin ?? old('origin') }}" required autocomplete="off" {{ request()->routeIs('airway_bills.delete') ? 'disabled':'' }}>
	</div>
	<div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
		<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="destination">Destination</label>
		<input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-primary" name="destination" id="destination" type="text" placeholder="Jakarta - Indonesia" value="{{ $airwayBill->destination ?? old('destination') }}" required autocomplete="off" {{ request()->routeIs('airway_bills.delete') ? 'disabled':'' }}>
	</div>
	
</div>