<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="p-6 bg-white shadow-lg sm:rounded-lg">
				<div class="mb-4 flex justify-between">
					<div class="font-bold">Customers Data</div>
					<a href="{{ route('customers.create') }}" class="bg-primary hover:text-secondary text-white text-xs font-bold py-1 px-3 m-1 rounded">Add New</a>
				</div>

				@if (session('status'))
					<div class="text-center mb-4 text-white rounded py-2 {{ session('bg-color') }}">
						{{ session('status') }}
					</div>
				@endif
				
				<table class="dataTables">
					<thead>
					  <tr>
						<th>No.</th>
						<th>Customers</th>
						<th>Aksi</th>
					  </tr>
					</thead>
					<tbody>
						@foreach ($customers as $customer)
						<tr>
							<td class="text-center no-sort"></td>
							<td>{{ $customer->name }}</td>
							<td class="flex justify-center content-center flex-wrap no-sort">
								<a href="{{ route('customers.show', $customer->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white text-xs font-bold py-1 px-2 m-1 rounded-full">Detail</a>
								<a href="{{ route('customers.edit', $customer->id) }}" class="bg-green-500 hover:bg-green-700 text-white text-xs font-bold py-1 px-2 m-1 rounded-full">Update</a>
								<a href="{{ route('customers.delete', $customer->id) }}" class="bg-red-500 hover:bg-red-700 text-white text-xs font-bold py-1 px-2 m-1 rounded-full">Delete</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				  </table>
			</div>
        </div>
    </div>
</x-app-layout>