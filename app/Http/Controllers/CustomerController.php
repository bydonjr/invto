<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;


class CustomerController extends Controller
{

    public function Create()
    {
        return view('customer.create');
    }


    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers',
            'phone' => 'required|string|max:15',
        ]);

        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->save();


        return redirect()->route('customer.view')->with('success', 'Customer created successfully');
    }


    public function Show()
    {
        $customers = Customer::all();
        return view('customer.view', compact('customers'));
    }

    public function index()
{
    $customers = Customer::all();  // Retrieve all customers
    return view('customer.view', compact('customers')); // Pass to the view
}


public function edit($id)
{
    $customer = Customer::findOrFail($id); // Find the customer by ID or fail
    return view('customer.edit', compact('customer')); // Pass the customer to the view
}

public function update(Request $request, $id)
{
    // Validate the incoming request data
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
    ]);

    // Find the customer by ID
    $customer = Customer::findOrFail($id);

    // Update the customer with the new data
    $customer->update($request->all());

    // Redirect to the customer view page after updating
    return redirect()->route('customer.view', $customer->id)->with('success', 'Customer updated successfully');
}



public function destroy($id)
{
    $customer = Customer::find($id);
    if ($customer) {
        $customer->delete();  // Delete the customer
    }

    return redirect()->route('customers.index')->with('success', 'Customer deleted successfully');
}


}
