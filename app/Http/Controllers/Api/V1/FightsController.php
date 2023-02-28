<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\gymowners;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use http\Env\Response;

use Illuminate\Support\Facades\DB;
use App\Models\fights;

class FightsController extends Controller
{
    public function index()
    {
        $fights = fights::select('a.name as users1',
            'b.name as users2',
            'd.name as gym',
            'e.name as art',
        )
            ->join('users as a', 'a.id', '=', 'fights.user1')
            ->join('users as b', 'b.id', '=', 'fights.user2')
            ->join('gyms as d', 'd.id', '=', 'fights.gym_id')
            ->join('martialarts as e', 'e.id', '=', 'fights.martialarts_id')
            ->get();
        return response()->json($fights);
    }
}
