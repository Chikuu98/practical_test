<?php

namespace App\Http\Controllers;

use App\Models\ContactPerson;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListController extends Controller
{
    public function showList(Request $request)
    {
        $data = ContactPerson::all();

        $search = $request->input('search');
        $data = ContactPerson::select('contact_people.*')
            ->join('customers', 'contact_people.customer_id', '=', 'customers.id')
            ->where(function ($query) use ($search) {
                $query->where('contact_people.name', 'LIKE', '%' . $search . '%')
                    ->orWhere('customers.name', 'LIKE', '%' . $search . '%');
            })->get();

        return view('contact-persons-list', compact('data'));
    }

    public function editContactPerson($id)
    {
        $customers = Customer::all();

        $types = config('types.types');

        $contactPerson = ContactPerson::find($id);

        return view('edit-contactPerson', compact('contactPerson', 'types', 'customers'));
    }

    public function deleteContactPerson($id)
    {
        $contactPerson = ContactPerson::find($id);

        if (!$contactPerson) {
            return redirect()->route('showList')->with('error', 'Contact Person not found.');
        }

        $contactPerson->delete();

        return redirect()->route('showList')->with('success', 'Contact Person deleted successfully.');
    }

    public function updateContactPerson(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:50',
            'city' => 'required|max:100',
            'type' => 'required',
            'customer_id' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('contact_people', 'email')->ignore($id),
            ],
        ]);


        $ContactPerson = ContactPerson::find($id);

        if (!$ContactPerson) {
            abort(404);
        }

        $ContactPerson->update($validatedData);

        return redirect()->route('showList')->with('success', 'Contact Person updated successfully.');
    }
}
