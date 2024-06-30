<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function create()
    {
    }

    public function store(Request $request)
    {
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

        //insert into customers values ('name','address')
        // TRUE / FALSE
        // return true
        if ($customer->save()) {
            return redirect()->route('customer.show', $customer->id);
        } else {
            dd('Data Gagal di simpan: ');
        }
    }
    public function show($id)
    {
        // select * from customers where id = 1
        $customers = Customer::find($id);

        return view('customers.show', compact('customers'));
    }
    public function index()
    {
        // select * from customers

        $customers = Customer::all();
        // $customers = Customer::orderBy('id','DESC')->get();

        return view('customers.index', compact('customers'));
    }
    // method untuk mengambil data
    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('customers.edit', compact('customer'));
    }
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:30',
            'address' => 'required',
            'phone' => 'numeric'
        ]);

        // UPDATE customers set name='', phone='', address='' where id=''
        $customer = Customer::find($request->id);

        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->address = $request->address;

        //insert into customers values ('name','address')
        if ($customer->save()) {
            return redirect()->route('customer.index')->with('success', "Data Nasabah $customer->code Berhasil Di perbaharui");
        } else {
            dd('Data Gagal di simpan: ');
        }
    }
    public function destroy($id)
    {
        $customer = Customer::find($id);
        if ($customer->delete()) {
            return redirect()->route('customer.index')->with('success', "Data Nasabah $customer->code Berhasil Di Hapus");
        } else {
            dd('Data Gagal di simpan: ');
        }
    }
}
