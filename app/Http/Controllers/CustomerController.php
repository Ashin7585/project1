<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer; // Importing the Customer model

class CustomerController extends Controller
{
    // Method to show the form view
    public function showForm()
    {
        return view('home'); // Renders the customer_form.blade.php view
    }

    // Method to handle form submission
    public function submitForm(Request $request)
    {
        // Validate the form data using Laravel's validation rules
        $request->validate([
            'customerName' => 'required|string|max:255',
            'customerAddress' => 'required|string',
            'contactNo' => 'required|numeric',
        ]);

        // Create a new instance of the Customer model and save the data to the database
        Customer::create([
            'name' => $request->input('customerName'),
            'address' => $request->input('customerAddress'),
            'contact_no' => $request->input('contactNo'),
        ]);

        // Redirect back to the form view with a success message using named route
        return redirect()->route('customer.form')->with('success', 'Customer information has been submitted successfully.');
    }
}
