<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer; // Importing the Customer model
use Illuminate\Support\Facades\DB;

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
        // Custom error messages
        $messages = [
            'customerName.required' => 'Customer name is required.',
            'customerAddress.required' => 'Customer address is required.',
            'contactNo.required' => 'Contact number is required.',
            'contactNo.numeric' => 'Contact number must be a number.',
            'contactNo.digits' => 'Contact number must be exactly 10 digits.',
        ];
    
        // Validate the form data using Laravel's validation rules
        $request->validate([
            'customerName' => 'required|string|max:255',
            'customerAddress' => 'required|string',
            'contactNo' => 'required|numeric|digits:10',
        ], $messages);

        // Create a new instance of the Customer model and save the data to the database
        Customer::create([
            'name' => $request->input('customerName'),
            'address' => $request->input('customerAddress'),
            'contact_no' => $request->input('contactNo'),
        ]);

        // Redirect back to the form view with a success message using named route
        return redirect()->route('customer.form')->with('success', 'Customer information has been submitted successfully.');
    
    }
    public function showCustomers()
    {
        // Fetch all customers from the database
        $customers = DB::table('customer')->select('id', 'name', 'address','contact_no')->get();

        // Return the view with customer data
        return view('customers', ['customers' => $customers]);
    }
    public function editCustomer($id)
    {
        // Fetch customer data by id
        $customer = DB::table('customer')->where('id', $id)->first();

        // Return the edit view with customer data
        return view('editCustomer', ['customer' => $customer]);
    }

    public function updateCustomer(Request $request, $id)
    {
        // Validate the form data
        $request->validate([
            'customerName' => 'required|string|max:255',
            'customerAddress' => 'required|string',
            'contactNo' => 'required|numeric|digits:10',
        ]);

        // Update customer data in the database
        DB::table('customer')->where('id', $id)->update([
            'name' => $request->customerName,
            'address' => $request->customerAddress,
            'contact_no' => $request->contactNo,
        ]);

        // Redirect back to the customers list with a success message
        return redirect()->route('customers.list')->with('success', 'Customer updated successfully.');
    }

    public function deleteCustomer($id)
    {
        // Delete customer data by id
        DB::table('customer')->where('id', $id)->delete();

        // Redirect back to the customers list with a success message
        return redirect()->route('customers.list')->with('success', 'Customer deleted successfully.');
    }

}
