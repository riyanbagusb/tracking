<div class="flex flex-wrap -mx-3 mb-2">
	<div class="w-full px-3">
		<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">Customer Name</label>
		<input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-primary" name="name" id="name" type="text" placeholder="PT. Alyeen Afindo Internasional" value="{{ $customer->name ?? old('name') }}" required autocomplete="off" {{ request()->routeIs('customers.delete') ? 'disabled':'' }}>
	</div>
</div>