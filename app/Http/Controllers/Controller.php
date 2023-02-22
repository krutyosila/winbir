<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function get(Request $request)
    {
        $yours = Rate::where('ip_addr', $request->ip())->first();
        return ['avg' => round((Rate::avg('rate') ?: 0) * 20), 'yours' => $yours ? $yours->rate : 5, 'total' => number_format(Rate::count())];
    }

    public function home(Request $request)
    {
        $data = $this->get($request);
        return view('welcome', compact('data'));
    }
}
