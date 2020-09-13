<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

		@if (!$airway_bill)
		<div class="text-center font-bold text-xl text-warning bg-secondary rounded">Airway Bill Not Found</div>
		@endif

		@if ($airway_bill)
		<table>
			<tr>
				<td>Airway Bill</td>
				<td>: {{ $airway_bill->airway_bill }}</td>
			</tr>
			<tr>
				<td>Origin</td>
				<td>: {{ $airway_bill->origin }}</td>
				 
			</tr>
			<tr>
				<td>Destination</td>
				<td>: {{ $airway_bill->destination }}</td>
			</tr>
		</table>
		@endif

		@if ($airway_bill)
		@if (!$tracking_statuses->isEmpty())
		<table class="table-auto w-full mt-4">
			<thead>
			<tr class="bg-gray-100">
				<th class="border px-4 py-2">Status</th>
				<th class="border px-4 py-2">Locations</th>
			</tr>
			</thead>
			<tbody>
				@foreach ($tracking_statuses as $ts)
					<tr>
						<td class="border px-4 py-2">
							<div class="text-xs">
								{{ Carbon\Carbon::parse($ts->date)->format('l, j F Y') }}
							</div>
							<div>
								{{ $ts->status }}
							</div>
						</td>
						<td class="border px-4 py-2 text-center">{{ $ts->location }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		@else
			<div class="text-center mt-4 font-bold text-warning bg-secondary rounded">
				No Tracking Status
			</div>
		@endif
		@endif
		<div class="mt-6 text-right">
			<a class="underline text-sm text-gray-600 hover:text-gray-900 mr-2" href="{{ route('home') }}">
				{{ __('Track Again') }}
			</a>
			<a class="underline text-sm text-gray-600 hover:text-gray-900" href="https://ayleenafindo.com">
				{{ __('Back to Home') }}
			</a>
		</div>
    </x-jet-authentication-card>
</x-guest-layout>
