<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CustomerCollection;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function index()
    {
        return new CustomerCollection(Customer::latest()->paginate(5));
    }


    public function store(Request $request)
    {
        $this->validate($request,[
           'name' => 'required',
           'email' => 'required',
           'phone' => 'required',
        ]);

        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->save();
        return new CustomerResource($customer);
    }


    public function show($id)
    {
        return new CustomerResource(Customer::findOrFail($id));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        $customer =  Customer::findOrFail($id);
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->save();
        return new CustomerResource($customer);
    }


    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return new CustomerResource($customer);
    }
}
