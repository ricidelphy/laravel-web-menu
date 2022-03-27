<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Customer;

class OrderController extends Controller
{

    // STORE //
    public function order(Request $request)
    {
        try {
            $customer = new Customer;
            $customer->nama_customer                    = $request->nama_customer;
            $customer->nomor_hp                         = $request->nomor_hp;
            $customer->email                            = $request->email;
            $customer->save();

            $order = new Order;
            $order->customer_id                          = $customer->id;
            $order->produk                               = $request->produk;
            $order->meja_id                              = $request->meja_id;
            $order->area_id                              = $request->area_id;
            $order->type                                 = $request->type;
            $order->jenis_pembayaran                     = $request->jenis_pembayaran;
            $order->nama_bank                            = $request->nama_bank;
            $order->nomor_kartu                          = $request->nomor_kartu;
            $order->expiration                           = $request->expiration;
            $order->total                                = $request->total;
            $order->save();

            return response()->json(['success' => true]);
        } catch (Throwable $e) {

            return response()->json(['success' => false, 'message' => $e]);
        }
    }
}
