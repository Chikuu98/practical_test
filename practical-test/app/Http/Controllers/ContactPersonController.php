<?php

namespace App\Http\Controllers;

use App\Models\ContactPerson;
use App\Models\Customer;
use Illuminate\Http\Request;

class ContactPersonController extends Controller
{
    public function showSecondForm()
    {
        $customers = Customer::all();
        $types = config('types.types');
        return view('add-contactPerson', compact('types', 'customers'));
    }

    public function submitContactPerson(Request $request)
    {
        $messages = [
            'name.required' => 'Customer Name is required.',
            'name.max' => 'Customer Name must not exceed 50 characters.',
            'city.required' => 'City is required.',
            'city.max' => 'City must not exceed 100 characters.',
            'type.required' => 'Type is required.',
            'customer_id.required' => 'Customer is required.',

        ];

        $validatedData = $request->validate([
            'name' => 'required|max:50',
            'city' => 'required|max:100',
            'type' => 'required',
            'customer_id' => 'required'
        ], $messages);

        ContactPerson::create($validatedData);

        return redirect()->route('showSecondForm')->with('success', 'Contact Person submitted successfully.');
    }
}
