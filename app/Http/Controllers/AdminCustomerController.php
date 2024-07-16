<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\MandatorySaving;
use App\Models\MyLoan;
use Illuminate\Http\Request;

class AdminCustomerController extends Controller
{
    public function create()
    {
        return view('admin.customers.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'code' => 'required|unique:customers|max:4',
            'name' => 'required|max:30',
            'gender' => 'required',
            'address' => 'required',
            'phone' => 'numeric',
        ]);

        $customer = new Customer();
        $customer->code = $request->code;
        $customer->name = $request->name;
        $customer->gender = $request->gender;
        $customer->phone = $request->phone;
        $customer->address = $request->address;

        if ($customer->save()) {
            return redirect()->route('admin-customer.index')->with('success', "Data Nasabah dengan kode $customer->code berhasil disimpan");
        } else {
            return redirect()->back()->with('error', 'Gagal menyimpan data nasabah');
        }
    }

    public function show($id)
    {
        $customer = Customer::find($id);
        $mandatorySaving = MandatorySaving::where('customer_id', $id)->get();
        $myLoan = MyLoan::where('customer_id', $id)->get();
        return view('admin.customers.show', compact('customer', 'mandatorySaving', 'myLoan'));
    }

    public function index()
    {
        $customers = Customer::orderBy('code', 'ASC')->get();
        return view('admin.customers.index', compact('customers'));
    }

    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('admin.customers.edit', compact('customer'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:30',
            'address' => 'required',
            'phone' => 'numeric',
        ]);

        $customer = Customer::find($request->id);
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->address = $request->address;

        if ($customer->save()) {
            return redirect()->route('admin-customer.index')->with('success', "Data Nasabah dengan kode $customer->code berhasil diperbarui");
        } else {
            return redirect()->back()->with('error', 'Gagal memperbarui data nasabah');
        }
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);
        if ($customer->delete()) {
            return redirect()->route('admin-customer.index')->with('success', "Data Nasabah dengan kode $customer->code berhasil dihapus");
        } else {
            return redirect()->back()->with('error', 'Gagal menghapus data nasabah');
        }
    }
}