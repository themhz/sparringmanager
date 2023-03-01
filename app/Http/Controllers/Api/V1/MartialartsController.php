<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\martialarts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MartialartsController extends Controller
{
    public function index()
    {
        $martialarts = martialarts::all();
        return response()->json($martialarts);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required|string|max:191',
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>422,
                'errors'=>$validator->messages()
            ],422);
        }else{
            $martialarts = martialarts::create([
                'name'=> $request->name,
            ]);

            if($martialarts){
                return response()->json(['status'=>200, 'message'=>'martial art Added Successfully'],200);
            }else{
                return response()->json(['status'=>500, 'something went wrong'],500);
            }
        }
    }
}
