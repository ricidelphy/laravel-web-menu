<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    // STORE //
    public function store(Request $request)
    {
        try {

            $customer = new Customer;
            $customer->nama_customer                    = $request->nama_customer;
            $customer->nomor_hp                         = $request->nomor_hp;
            $customer->email                            = $request->email;
            $customer->password                         = Hash::make($request->password);
            $customer->type                             = $request->type;
            $customer->save();

            return response()->json(['success' => true]);
        } catch (Throwable $e) {

            return response()->json(['success' => false, 'message' => $e]);
        }
    }

    // UPDATE //
    public function update(Request $request, $id)
    {
        try {
            $customer = Customer::find($id);
            $customer->nama_customer                    = $request->nama_customer;
            $customer->nomor_hp                         = $request->nomor_hp;
            $customer->email                            = $request->email;
            $customer->password                         = $request->password != null ? Hash::make($request->password) : $customer->password;
            $customer->type                             = $request->type;
            $customer->update();

            return response()->json(['success' => true]);
        } catch (Throwable $e) {

            return response()->json(['success' => false, 'message' => $e]);
        }
    }
}
