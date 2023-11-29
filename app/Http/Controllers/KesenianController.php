<?php

namespace App\Http\Controllers;

use App\Models\Kesenian;
use Illuminate\Http\Request;
use Validator;

class KesenianController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $response = array();
        $a = 1;
        $kesenian = Kesenian::all();
        foreach($kesenian as $key) {
            $h["no"] = $a;
            $h["id"] = $key->id;
            $h["kesenian"] = $key->kesenian;

            array_push($response, $key);
            $a++;
        }
        return response()->json(["data" => $response]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "kesenian" => "required|regex:/^[a-zA-Z0-9._ -]*$/",
        ]);

        if($validator->fails()) {
            return response()->json(["message" => "Ada yang salah dalam pengetikan"]);
        }

        $kesenian = Kesenian::create([
            "kesenian" => $request->kesenian,
        ]);

        return response()->json(["message" => "Berhasil!"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Kesenian $kesenian, $id)
    {
        $kesenian = Kesenian::where("id", $id)->first();
        if($kesenian) {
            return response()->json(["data" => $kesenian]);
        } else {
            return response()->json(["message" => "Tidak dapat menemukan ID"]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kesenian $kesenian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kesenian $kesenian, $id)
    {
        $validator = Validator::make($request->all(), [
            "kesenian" => "required|regex:/^[a-zA-Z0-9._ -]*$/",
        ]);

        if($validator->fails()) {
            return response()->json(["message" => "Ada yang salah dalam pengetikan"]);
        }

        $kesenian = Kesenian::where("id", $id)->first();
        if($kesenian) {
            $kesenian -> update([
                "kesenian" => $request->kesenian,
            ]);
            return response()->json(["message" => "Berhasi update"]);
        } else {
            return response()->json(["message" => "Gagal update, ID salah"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kesenian $kesenian, $id)
    {
        $kesenian = kesenian::where("id", $id)->delete();
        if($kesenian) {
            return response()->json(["message" => "Berhasi menghapus"]);
        } else {
            return response()->json(["message" => "Gagal menghapus, ID salah"]);
        }
    }
}
