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

}
