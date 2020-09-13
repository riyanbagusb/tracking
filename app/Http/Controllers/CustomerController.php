<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::get();

        return view('customer.index', compact('customers'));
    }

    public function create()
    {
        return view('customer.create');
    }

    public function store(Request $request)
    {
		Customer::create($this->validateData());
		
		return redirect('customers')
			->with('status', 'Customer created!')
			->with('bg-color', 'bg-green-500');
    }

    public function show(Customer $customer)
    {
        $airway_bills = $customer->AirwayBills;
        return view('customer.show', compact('customer', 'airway_bills'));
    }

    public function edit(Customer $customer)
    {
		return view('customer.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
		$customer->update($this->validateData());
		
		return redirect('customers')
			->with('status', 'Customer updated!')
			->with('bg-color', 'bg-green-500');
    }

    public function delete($id)
    {
		$customer = Customer::find($id);
		return view('customer.delete', compact('customer'));
	}

    public function destroy(Customer $customer)
    {
		$customer->delete();
		return redirect('customers')
			->with('status', 'Customer deleted!')
			->with('bg-color', 'bg-red-500');
	}
	
	protected function validateData()
	{
		return request()->validate([
            'name' => 'required'
        ]);
	}
}
