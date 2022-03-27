<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use Illuminate\Http\Request;

class MejaController extends Controller
{
    public function index(Request $request)
    {
        $mejas = Meja::where('area_id', $request->area_id)->get();

        return response()->json(['data' => $mejas]);
    }
}
