<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index(Request $request)
    {

        $produks = Produk::where('status', 1)->with('kategori');

        if ($request->has('search') != null) {
            return $produks->where('kategori_id', $request->input('search'))->get();
        } else {
            return $produks->get();
        }
        return response()->json(['data' => $produks]);
    }
}
