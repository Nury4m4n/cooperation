<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\Customer;
use App\Models\MandatorySaving;
use App\Models\MySaving;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{

    public function store(Request $request)
    {
        // Validasi data dari request
        $validatedData = $request->validate([
            'image' => 'nullable|image|file', // Tambahkan ukuran maksimum
            'code' => 'required|unique:customers|max:4',
            'name' => 'required|max:30',
            'gender' => 'required',
            'address' => 'required',
            'phone' => 'nullable|numeric' // Tambahkan nullable jika phone opsional
        ]);
        $validatedData['user_id'] = auth()->user()->id;

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('profile');
        }
        Customer::create($validatedData);

        return redirect(route('customer.index'))->with('success', 'Data Berhasil DI Update');
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

    public function update(Request $request, Customer $customer)
    {
        $validatedData = $request->validate([
            'image' => 'nullable|image|file',
            'name' => 'required|max:30',
            'gender' => 'required',
            'address' => 'required',
            'phone' => 'nullable|numeric'
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        if ($request->file('image')) {
            if ($customer->image) {
                Storage::delete($customer->image);
            }
            $validatedData['image'] = $request->file('image')->store('profile');
        }
        $customer->update($validatedData);
        return redirect(route('customer.index'))->with('success', 'Data Berhasil Diperbarui');
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