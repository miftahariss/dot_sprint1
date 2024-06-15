<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProvinceController extends Controller
{
    public function search(Request $request)
    {
        $provinceId = $request->query('id');

        if ($provinceId) {
            $province = DB::table('provinces')->where('id', $provinceId)->first();
            return response()->json($province);
        } else {
            $provinces = DB::table('provinces')->get();
            return response()->json($provinces);
        }
    }
}
