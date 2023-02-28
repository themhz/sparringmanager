<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\martialarts;

class MartialartsController extends Controller
{
    public function index()
    {
        $martialarts = martialarts::all();
        return response()->json($martialarts);
    }
}
