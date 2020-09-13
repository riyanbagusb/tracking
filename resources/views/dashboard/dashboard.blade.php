<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="p-6 mb-4 bg-primary shadow-lg text-center text-white text-xl sm:rounded-lg">
				Welcome <span class="text-secondary">{{ Auth::user()->name }}</span>, This page contains statistical data on the system.
			</div>
			<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
				@livewire('counter', ['title' => 'Total Customers', 'color' => 'text-secondary', 'counter' => $data['customers']])
				@livewire('counter', ['title' => 'Total Airway Bills', 'color' => 'text-green-500', 'counter' => $data['airway_bills']])
			</div>
        </div>
    </div>
</x-app-layout>
