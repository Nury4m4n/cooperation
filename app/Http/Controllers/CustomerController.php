<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Facade\FlareClient\View;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function create()
    {
        return View('customers.create');
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

        if ($customer->save()) {
            return redirect()->route('customer.index')->with('success', "Data Nasabah $customer->code Berhasil Di simpan");
        } else {
            dd('Data Gagal di simpan: ');
        }
    }

    public function show($id)
    {
        $customer = Customer::find($id);
        return view('customers.show', compact('customer'));
    }

    public function index()
    {
        $customers = Customer::orderBy('code', 'ASC')->get();;
        return view('customers.index', compact('customers'));
    }

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
        $customer = Customer::find($request->id);
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
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