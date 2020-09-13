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
					<div class="font-bold">Update Airway Bill Status</div>
				</div>
				<form method="POST" action="{{ route('tracking_statuses.update', $trackingStatus->id) }}" class="w-full">
					@csrf
					@method('PATCH')
					@include('tracking.form')
					<div class="md:flex md:items-center">
						<button class="shadow bg-primary hover:text-secondary focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
							Update
						</button>
					</div>
				</form>
			</div>
        </div>
    </div>
</x-app-layout>