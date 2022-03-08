<?php

namespace App\Http\Controllers\CustomerController;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    
    public function showAllCustomers()
    {
        return response()->json(Customer::all());
    }

    public function showOneCustomer($id)
    {
        return response()->json(Customer::find($id));
    }

    public function create(Request $request)
    {
        $author = Customer::create($request->all());

        return response()->json($author, 201);
    }

    public function update($id, Request $request)
    {
        $author = Customer::findOrFail($id);
        $author->update($request->all());

        return response()->json($author, 200);
    }

    public function delete($id)
    {
        Customer::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}