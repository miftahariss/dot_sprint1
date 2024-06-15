<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CityController extends Controller
{
    public function search(Request $request)
    {
        $cityId = $request->query('id');

        if ($cityId) {
            $city = DB::table('cities')->where('id', $cityId)->first();
            return response()->json($city);
        } else {
            $cities = DB::table('cities')->get();
            return response()->json($cities);
        }
    }
}
