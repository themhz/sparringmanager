<?php

namespace App\Http\Controllers\Api\V1;
use Illuminate\Support\Facades\Validator;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\usermartialarts;
use App\Models\users;
use App\Models\martialarts;


class UsermartialartsController extends Controller
{
    public function index()
    {
        $Usermartialarts = usermartialarts::select('users.id', 'users.name', 'users.picture as picture', 'martialarts.name as martialart')
            ->join('martialarts', 'usermartialarts.martialarts_id', '=', 'martialarts.id')
            ->join('users', 'users.id', '=', 'usermartialarts.user_id')
            ->get();
        return response()->json($Usermartialarts);
    }

    public function store(Request $request)
    {
        //print_r($request->all())
        $validator = Validator::make($request->all(),[
            'user_id'=>'required|integer',
            'martialarts_id'=>'required|integer',
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>422,
                'errors'=>$validator->messages()
            ],422);
        }else{
            $user = usermartialarts::create([
                'user_id'=> $request->user_id,
                'martialarts_id'=>$request->martialarts_id,
            ]);

            if($user){
                return response()->json(['status'=>200, 'message'=>'martial art Added Successfully'],200);
            }else{
                return response()->json(['status'=>500, 'something went wrong'],500);
            }
        }
    }
}
