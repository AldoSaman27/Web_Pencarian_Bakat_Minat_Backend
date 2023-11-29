<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Validator;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = array();
        $a = 1;
        $kategori = Kategori::all();
        foreach($kategori as $key) {
            $h["no"] = $a;
            $h["id"] = $key->id;
            $h["kategori"] = $key->kategori;

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
            "kategori" => "required|regex:/^[a-zA-Z0-9._ -]*$/",
        ]);

        if($validator->fails()) {
            return response()->json(["message" => "Ada yang salah dalam pengetikan"]);
        }

        $kategori = Kategori::create([
            "kategori" => $request->kategori,
        ]);

        return response()->json(["message" => "Berhasil!"]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori, $id)
    {
        $kategori = Kategori::where("id", $id)->first();
        if($kategori) {
            return response()->json(["data" => $kategori]);
        } else {
            return response()->json(["message" => "Tidak dapat menemukan ID"]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori, $id)
    {
        $validator = Validator::make($request->all(), [
            "kategori" => "required|regex:/^[a-zA-Z0-9._ -]*$/",
        ]);

        if($validator->fails()) {
            return response()->json(["message" => "Ada yang salah dalam pengetikan"]);
        }

        $kategori = Kategori::where("id", $id)->first();
        if($kategori) {
            $kategori -> update([
                "kategori" => $request->kategori,
            ]);
            return response()->json(["message" => "Berhasi update"]);
        } else {
            return response()->json(["message" => "Gagal update, ID salah"]);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori, $id)
    {
        $kategori = Kategori::where("id", $id)->delete();
        if($kategori) {
            return response()->json(["message" => "Berhasi menghapus kategori"]);
        } else {
            return response()->json(["message" => "Gagal menghapus kategori, ID salah"]);
        }
    }
}
