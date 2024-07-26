<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Customer;
use App\Models\MandatorySaving;
use App\Models\MySaving;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MyLoan;

class CustomerController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'image|file|max:10000',
            'code' => 'required|unique:customers|max:4',
            'name' => 'required|max:30',
            'gender' => 'required',
            'address' => 'required',
            'phone' => 'nullable|numeric',
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('profile');
        }

        Customer::create($validatedData);

        return redirect(route('customer.index'))->with('success', 'Data nasabah berhasil ditambahkan!');
    }

    public function index()
    {
        $userId = Auth::id();
        $customer = Customer::where('user_id', $userId)->first();
        $mandatorySavings = $customer ?
            MandatorySaving::where('customer_id', $customer->id)->orderBy('id', 'DESC')->get() : collect();
        $mySavings = $customer ?
            MySaving::where('customer_id', $customer->id)->orderBy('id', 'DESC')->get() : collect();
        $myLoans = $customer ?
            MyLoan::where('customer_id', $customer->id)->orderBy('id', 'DESC')->get() : collect();
        $customers = Customer::where('user_id', $userId)->get();
        $lastCustomer = Customer::orderBy('id', 'desc')->first();
        $lastCode = $lastCustomer ? $lastCustomer->code : null;
        $nextCode = $this->generateNextCustomerCode($lastCode);
        return view('customers.index', compact('customers', 'mySavings', 'mandatorySavings', 'nextCode', 'myLoans'));
    }

    public function edit(Customer $customer)
    {
        return view('customers.edit_modal', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $validatedData = $request->validate([
            'image' => 'image|file|max:10000',
            'name' => 'required|max:30',
            'gender' => 'required',
            'address' => 'required',
            'phone' => 'nullable|numeric',
        ]);

        if (!isset($validatedData['user_id'])) {
            $validatedData['user_id'] = auth()->user()->id;
        }

        if ($request->file('image')) {
            if ($customer->image) {
                Storage::disk('public')->delete($customer->image);
            }
            $validatedData['image'] = $request->file('image')->store('profile');
        }

        $customer->update($validatedData);

        return redirect(route('customer.index'))->with('success', 'Data nasabah berhasil diupdate!');
    }


    public function destroy($id)
    {
        $customer = Customer::find($id);

        if ($customer->delete()) {
            return redirect()->route('customer.index')->with('success', "Data nasabah berhasil dihapus!");
        } else {
            return redirect()->route('customer.index')->with('error', 'Terjadi kesalahan saat menghapus data nasabah.');
        }
    }

    private function generateNextCustomerCode($lastCode)
    {
        $prefix = 'N';

        if ($lastCode) {
            $lastNumber = (int) substr($lastCode, 1);
            $nextNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $nextNumber = '001';
        }

        return $prefix . $nextNumber;
    }
}
