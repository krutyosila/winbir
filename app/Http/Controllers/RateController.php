<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use Illuminate\Http\Request;

class RateController extends Controller
{
    public function avg(Request $request)
    {
        return response()->json($this->get($request));
    }

    public function rate(Request $request)
    {
        $request->validate([
            'rate' => ['required', 'numeric', 'min:1', 'max:5']
        ]);
        $result = Rate::updateOrInsert([
            'ip_addr' => $request->ip(),
        ], [
            'ip_addr' => $request->ip(),
            'rate' => $request->get('rate')
        ]);
        return response()->json($this->get($request));
    }
}
