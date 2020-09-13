<x-app-layout>
    <x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Airway Bill Statuses') }}
		</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="p-6 bg-white shadow-lg sm:rounded-lg">
				<div class="mb-4 flex justify-between">
					<div class="font-bold">Airway Bill Statuses</div>
					<a href="{{ route('tracking_statuses.create', $airwayBill->id) }}" class="bg-primary hover:text-secondary text-white text-xs font-bold py-1 px-3 m-1 rounded">Add New</a>
				</div>
				@if (session('status'))
					<div class="text-center mb-4 text-white rounded py-2 {{ session('bg-color') }}">
						{{ session('status') }}
					</div>
				@endif
				<div class="mb-4">
					<table>
						<tbody><tr>
							<td>Airway Bill</td>
							<td>: {{ $airwayBill->airway_bill }}</td>
						</tr>
						<tr>
							<td>Origin</td>
							<td>: {{ $airwayBill->origin }}</td>
							 
						</tr>
						<tr>
							<td>Destination</td>
							<td>: {{ $airwayBill->destination }}</td>
						</tr>
					</tbody></table>
				</div>
				<table class="dataTables">
					<thead>
					  <tr>
						<th>No.</th>
						<th>Status</th>
						<th>Locations</th>
						<th>Dates</th>
						<th>Aksi</th>
					  </tr>
					</thead>
					<tbody>
						@foreach ($tracking_statuses as $ts)
						<tr>
							<td class="text-center no-sort"></td>
							<td class="text-center">{{ $ts->status }}</td>
							<td class="text-center">{{ $ts->location }}</td>
							<td class="text-right"><span class="hidden">{{ $ts->date }}</span>{{ Carbon\Carbon::parse($ts->date)->format('l, j F Y') }}</td>
							<td class="flex justify-center content-center flex-wrap no-sort">
								<a href="{{ route('tracking_statuses.edit', $ts->id) }}" class="bg-green-500 hover:bg-green-700 text-white text-xs font-bold py-1 px-2 m-1 rounded-full">Update</a>
								<a href="{{ route('tracking_statuses.delete', $ts->id) }}" class="bg-red-500 hover:bg-red-700 text-white text-xs font-bold py-1 px-2 m-1 rounded-full">Delete</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
        </div>
    </div>
</x-app-layout>