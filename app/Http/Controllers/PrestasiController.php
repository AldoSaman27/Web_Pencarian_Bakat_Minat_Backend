<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Http\Request;
use Validator;

class PrestasiController extends Controller
{
    public function __construct() {
        $this->middleware("auth:sanctum", ["except"]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prestasi = Prestasi::all();
        return response()->json([
            "message" => "Prestasi index success",
            "prestasi" => $prestasi,
        ]);
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
            "prestasi" => "required|string|unique:prestasis",
        ]);

        if ($validator->fails()) return response()->json([
            "message" => "Invalid field",
            "errors" => $validator->errors(), 
        ]);

        $prestasi = Prestasi::create([
            "prestasi" => $request->prestasi,
        ]);

        if ($prestasi) return response()->json([
            "message" => "Prestasi store success",
            "prestasi" => $prestasi,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Prestasi $prestasi, $id)
    {
        $prestasi = Prestasi::where("id", $id)->first();
        if (!$prestasi) return response()->json(["message" => "Invalid prestasi id!"]);

        if ($prestasi) return response()->json([
            "message" => "Prestasi show success",
            "prestasi" => $prestasi,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prestasi $prestasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prestasi $prestasi, $id)
    {
        $validator = Validator::make($request->all(), [
            "prestasi" => "required|string|unique:prestasis",
        ]);

        if ($validator->fails()) return response()->json([
            "message" => "Invalid field",
            "errors" => $validator->errors(),
        ]);

        $prestasi = Prestasi::where("id", $id)->first();
        if (!$prestasi) return response()->json(["message" => "Invalid prestasi id!"]);

        $prestasi = $prestasi->update([
            "prestasi" => $request->prestasi,
        ]);

        if ($prestasi) return response()->json([
            "message" => "Prestasi update success",
            "prestasi" => Prestasi::where("id", $id)->first(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prestasi $prestasi, $id)
    {
        $prestasi = Prestasi::where("id", $id)->delete();
        if (!$prestasi) return response()->json(["message" => "Invalid prestasi id!"]);

        if ($prestasi) return response()->json(["message" => "Prestasi destroy success"]);
    }
}
