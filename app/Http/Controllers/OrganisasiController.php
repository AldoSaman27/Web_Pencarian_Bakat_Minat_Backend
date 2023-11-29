<?php

namespace App\Http\Controllers;

use App\Models\Organisasi;
use Illuminate\Http\Request;
use Validator;

class OrganisasiController extends Controller
{
    public function __construct() {
        $this->middleware("auth:sanctum", ["except"]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $organisasi = Organisasi::all();
        return response()->json([
            "message" => "Organisasi index success",
            "organisasi" => $organisasi,
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
            "organisasi" => "required|string|unique:organisasis",
        ]);

        if ($validator->fails()) return response()->json([
            "message" => "Invalid field",
            "errors" => $validator->errors(),
        ]);

        $organisasi = Organisasi::create([
            "organisasi" => $request->organisasi,
        ]);

        if ($organisasi) return response()->json([
            "message" => "Organisasi store success",
            "organisasi" => $organisasi,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Organisasi $organisasi, $id)
    {
        $organisasi = Organisasi::where("id", $id)->first();
        if (!$organisasi) return response()->json(["message" => "Invalid organisasi id!"]);

        if ($organisasi) return response()->json([
            "message" => "Organisasi show success",
            "organisasi" => $organisasi,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Organisasi $organisasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Organisasi $organisasi, $id)
    {
        $validator = Validator::make($request->all(), [
            "organisasi" => "required|string|unique:organisasis",
        ]);

        if ($validator->fails()) return response()->json([
            "message" => "Invalid field",
            "errors" => $validator->errors(),
        ]);

        $organisasi = Organisasi::where("id", $id)->first();
        if (!$organisasi) return response()->json(["message" => "Invalid organisasi id!"]);

        $organisasi = $organisasi->update([
            "organisasi" => $request->organisasi,
        ]);

        if ($organisasi) return response()->json([
            "message" => "Organisasi update success",
            "organisasi" => Organisasi::where("id", $id)->first(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organisasi $organisasi, $id)
    {
        $organisasi = Organisasi::where("id", $id)->delete();
        if (!$organisasi) return response()->json(["message" => "Invalid organisasi id!"]);

        if ($organisasi) return response()->json(["message" => "Organisasi destroy success"]);
    }
}
