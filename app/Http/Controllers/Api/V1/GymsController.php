<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use http\Env\Response;
use Illuminate\Support\Facades\DB;
use App\Models\gyms;

class GymsController extends Controller
{
    public function index()
    {
        $gyms = gyms::all();
        return response()->json($gyms);
    }
}
