<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\users;
use Illuminate\Support\Facades\Validator;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\sessions;


class SessionsController extends Controller
{
    public function index()
    {
        $sessions = sessions::select('sessions.id',
            'users.name',
            'users.picture as picture',
            'users.lastname as lastname',
            'sessions.name as sessionName',
            'sessions.created_at as created_at'
        )   ->join('users', 'users.id', '=', 'sessions.user_id')
            ->get();
        return response()->json($sessions);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required|string|max:191',
            'created_at'=>'required|datetime',
            'user_id'=>'required|integer',
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>422,
                'errors'=>$validator->messages()
            ],422);
        }else{
            $sessions = sessions::create([
                'name'=> $request->name,
                'created_at'=>$request->created_at,
                'user_id'=>$request->user_id,
            ]);

            if($sessions){
                return response()->json(['status'=>200, 'message'=>'session Added Successfully'],200);
            }else{
                return response()->json(['status'=>500, 'something went wrong'],500);
            }
        }
    }
}
