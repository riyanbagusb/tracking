<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $customer->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="p-6 bg-white shadow-lg sm:rounded-lg">
				<div class="mb-4 flex justify-between">
					<div class="font-bold">Airway Bills Data</div>
					<a href="{{ route('airway_bills.create') }}" class="bg-primary hover:text-secondary text-white text-xs font-bold py-1 px-3 m-1 rounded">Add New</a>
				</div>
				<table class="dataTables">
					<thead>
					  <tr>
						<th>No.</th>
						<th>Airway Bills</th>
						<th>Origins</th>
						<th>Destinations</th>
						<th>Aksi</th>
					  </tr>
					</thead>
					<tbody>
						@foreach ($airway_bills as $awb)
						<tr>
							<td class="text-center no-sort"></td>
							<td>{{ $awb->airway_bill }}</td>
							<td class="text-center">{{ $awb->origin }}</td>
							<td class="text-center">{{ $awb->destination }}</td>
							<td class="flex justify-center content-center flex-wrap no-sort">
								<a href="{{ route('airway_bills.show', $awb->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white text-xs font-bold py-1 px-2 m-1 rounded-full">Detail</a>
								<a href="{{ route('airway_bills.edit', $awb->id) }}" class="bg-green-500 hover:bg-green-700 text-white text-xs font-bold py-1 px-2 m-1 rounded-full">Update</a>
								<a class="bg-red-500 hover:bg-red-700 text-white text-xs font-bold py-1 px-2 m-1 rounded-full">Delete</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
        </div>
    </div>
</x-app-layout>