<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware("auth:sanctum",['except'=>["login"]]);
    }

    

    public function login(Request $request){
        $request->validate([
            "name"=>"required|string",
            "password"=>"required",
        ]);
    
        if(!Auth::attempt($request->only("name","password"))){
            return response()->json([
                "message"=>"User dan Password Salah..!",
            ],401);
        }
    
        $user=User::where("name", $request->name)->first();
        $token=$user->createToken("token")->plainTextToken;
    
        $token = $token;
        
        return response()->json([
            "message"=>"Suksess",
            "name"=>$user->name,
            "level"=>$user->level,
            "token"=>$token,
        ]);
        
    
    }


    public function register(Request $request){
        
            $validatedData = $request->validate([
                "name"=>"required",
                "password"=>"required",
            ]);
    
            $user=User::create([
              
                "name"=>$request->name,
                "password"=>bcrypt($request->password),
                "level"=>"User",
            ]);
    
            return response()->json([
                "message"=>"success",
                "name"=>$request->name,
                "level"=>$user->level,
            ]);
      
    
    
    }


    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            "message"=>"logout success"
        ]);
    }

    public function ceking()
    {
        $id = request()->user()->id;
        $name = request()->user()->name;
        $level = request()->user()->level;


        
        return response()->json([
            "id"=>$id,
            "name"=>$name,
            "level"=>$level,

        ]);

    }

  

}
