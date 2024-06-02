<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function create(){
        return view('customers.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'code' => 'required|unique:customers|max:4',
            'name' => 'required|max:30',
            'address' => 'required',
            'phone' => 'numeric'
        ]);
        $customer = new Customer();
        $customer->code = $request->code;
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->save();
    }
}
