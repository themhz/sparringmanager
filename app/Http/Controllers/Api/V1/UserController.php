<?php

namespace App\Http\Controllers\Api\V1;
//use Dotenv\Validator;
use Illuminate\Support\Facades\Validator;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\users;

class UserController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->get();
        return response()->json($users);
    }
    public function index2()
    {
        //return "index2";|
        $users = users::all();
        $data = [
            'status' => 200,
            'users' => $users
        ];
        return response()->json($data, 200);
    }
    public function store(Request $request)
    {
        //print_r($request->all())
        $validator = Validator::make($request->all(),[
            'name'=>'required|string|max:191',
            'lastname'=>'required|string|max:191',
            'email'=>'required|email|max:191',
            'phone'=>'required|digits:10',
            'username'=>'required|string|max:191',
            'password'=>'required|string|max:191',
            'status'=>'required|boolean'
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>422,
                'errors'=>$validator->messages()
            ],422);
        }else{
            $user = users::create([
                'name'=> $request->name,
                'lastname'=>$request->lastname,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'username'=>$request->username,
                'password'=>$request->password,
                'status'=>(bool)$request->status
            ]);

            if($user){
                return response()->json(['status'=>200, 'message'=>'user Added Successfully'],200);
            }else{
                return response()->json(['status'=>500, 'something went wrong'],500);
            }
        }
    }
    public function show($id){
        $user = users::find($id);

        if($user){
            return response()->json([
                'status'=>200,
                'user'=>$user
            ],422);
        }else{
            return response()->json([
                'status'=>404,
                'errors'=>"user not found"
            ],404);
        }

    }
    public function edit($id){
        $user = users::find($id);

        if($user){
            return response()->json([
                'status'=>200,
                'user'=>$user
            ],422);
        }else{
            return response()->json([
                'status'=>404,
                'errors'=>"user not found"
            ],404);
        }
    }
    public function update(Request $request, int $id){

        $user = users::find($id);

        //print_r($request->all())
        $validator = Validator::make($request->all(),[
            'name'=>'required|string|max:191',
            'lastname'=>'required|string|max:191',
            'email'=>'required|email|max:191',
            'phone'=>'required|digits:10',
            'username'=>'required|string|max:191',
            'password'=>'required|string|max:191',
            'status'=>'required|boolean'
        ]);

        if($user){
            if($validator->fails()){
                return response()->json([
                    'status'=>422,
                    'errors'=>$validator->messages()
                ],422);
            }else{
                $user->update([
                    'name'=> $request->name,
                    'lastname'=>$request->lastname,
                    'email'=>$request->email,
                    'phone'=>$request->phone,
                    'username'=>$request->username,
                    'password'=>$request->password,
                    'status'=>(bool)$request->status
                ]);

                if($user){
                    return response()->json(['status'=>200, 'message'=>'user updated Successfully'],200);
                }else{
                    return response()->json(['status'=>500, 'something went wrong'],500);
                }
            }
        }else{
            return response()->json(['status'=>500, 'user not found'],500);
        }

    }
    public function delete($id){
        $user = users::find($id);
        if($user) {
            $user->delete();
            return response()->json([
                'status' => 200,
                'message' => "user ".$id." deleted succesfully"
            ], 422);
        }
        else {
            return response()->json([
                'status' => 422,
                'errors' => "user ".$id ." not found"
            ], 422);
        }
    }
    public function showByEmail($email){

        $user = users::where('email', $email)->first();

        if ($user) {
            return response()->json([
                'success' => true,
                'data' => $user
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'User not found'
            ]);
        }
    }

//    public function index($field, $value)
//    {
//        $users = DB::table('users')->where($field, $value)->get(['id', 'name', 'picture', 'description', 'lastname', 'email', 'phone', 'username', 'status']);
//        return response()->json($users);
//    }
}
