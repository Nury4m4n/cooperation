<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\MandatorySaving;
use App\Models\MySaving;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'gender' => 'required',
            'address' => 'required',
            'phone' => 'numeric'

        ]);
        $customer = new Customer();
        $customer->user_id = auth()->user()->id;
        $customer->code = $request->code;
        $customer->name = $request->name;
        $customer->gender = $request->gender;
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
        $mandatorySaving = MandatorySaving::find($id);

        $customer = Customer::find($id);
        return view('customers.show', compact('customer', 'mandatorySaving'));
    }


    public function index()
    {
        $userId = Auth::id();
        $customer = Customer::where('user_id', $userId)->first();

        $mandatorySavings = $customer ?
            MandatorySaving::where('customer_id', $customer->id)->orderBy('id', 'DESC')->get() : collect();

        $mySavings = $customer ?
            MySaving::where('customer_id', $customer->id)->orderBy('id', 'DESC')->get() : collect();

        $customers = Customer::where('user_id', $userId)->get();
        // Ambil kode nasabah terakhir
        $lastCustomer = Customer::orderBy('id', 'desc')->first();
        $lastCode = $lastCustomer ? $lastCustomer->code : null;

        // Generate kode nasabah berikutnya
        $nextCode = $this->generateNextCustomerCode($lastCode);




        return view('customers.index', compact('customers', 'mySavings', 'mandatorySavings', 'nextCode'));
    }

    public function edit(Customer $customer)
    {
        return view('customers.edit_modal', compact('customer'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'phone' => 'numeric'
        ]);
        // Generate kode nasabah otomatis
        $lastCustomer = Customer::orderBy('id', 'desc')->first();
        $lastCode = $lastCustomer ? $lastCustomer->code : null;
        $nextCode = $this->generateNextCustomerCode($lastCode);

        $customer = Customer::find($request->id);
        $customer->name = $request->name;
        $customer->gender = $request->gender;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        if ($customer->save()) {
            return redirect()->route('customer.index')->with('success', "Data Nasabah  Berhasil Diperbarui");
        } else {
            dd('Data Gagal di simpan: ');
        }
    }


    public function destroy($id)
    {
        $customer = Customer::find($id);
        if ($customer->delete()) {
            return redirect()->route('customer.index')->with('success', "Data Nasabah Berhasil Di Hapus");
        } else {
            dd('Data Gagal di simpan: ');
        }
    }

    private function generateNextCustomerCode($lastCode)
    {
        $prefix = 'N';
        if ($lastCode) {
            $lastNumber = (int)substr($lastCode, 1); // Ambil bagian angka dari kode terakhir
            $nextNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT); // Tambahkan 1 dan format dengan nol di depan
        } else {
            $nextNumber = '001'; // Jika belum ada nasabah, mulai dari 001
        }
        return $prefix . $nextNumber;
    }
}
