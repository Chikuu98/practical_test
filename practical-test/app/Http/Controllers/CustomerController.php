<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function showForm()
    {
        $types = config('types.types');
        return view('add-customer', compact('types'));
    }

    public function submitCustomer(Request $request)
    {
        $messages = [
            'name.required' => 'Customer Name is required.',
            'name.max' => 'Customer Name must not exceed 50 characters.',
            'city.required' => 'City is required.',
            'city.max' => 'City must not exceed 100 characters.',
            'type.required' => 'Type is required.',
        ];

        $validatedData = $request->validate([
            'name' => 'required|max:50',
            'city' => 'required|max:100',
            'type' => 'required',
        ], $messages);

        Customer::create($validatedData);

        return redirect()->route('showForm')->with('success', 'Customer submitted successfully.');
    }
}
