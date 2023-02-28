<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use http\Env\Response;

use Illuminate\Support\Facades\DB;
use App\Models\gymowners;


class GymOwnersController extends Controller
{
    public function index()
    {
        $gymowners = gymowners::select('gyms.name as gymname',
            'gyms.picture as gympicture',
            'gyms.email as gymemail',
            'gyms.address as address',
            'gyms.address as phone',
            'gyms.phone as gymphone',
            'users.name as username',
            'users.lastname as userlastname',
        )
            ->join('gyms', 'gyms.id', '=', 'gymowners.gym_id')
            ->join('users', 'users.id', '=', 'gymowners.user_id')
            ->get();
        return response()->json($gymowners);
    }
}
