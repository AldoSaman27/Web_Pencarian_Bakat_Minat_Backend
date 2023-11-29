<?php

namespace App\Http\Controllers;

use App\Models\Olahraga;
use Illuminate\Http\Request;
use Validator;

class OlahragaController extends Controller
{
    public function __construct() {
        $this->middleware("auth:sanctum", ["except"]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $olahraga = Olahraga::all();
        return response()->json([
            "message" => "Olahraga index success",
            "olahraga" => $olahraga,
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
            "olahraga" => "required|string|unique:olahragas",
        ]);

        if ($validator->fails()) return response()->json([
            "message" => "Invalid field",
            "errors" => $validator->errors(),
        ]);

        $olahraga = Olahraga::create([
            "olahraga" => $request->olahraga,
        ]);

        if ($olahraga) return response()->json([
            "message" => "Olahraga store success",
            "olahraga" => $olahraga,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Olahraga $olahraga, $id)
    {
        $olahraga = Olahraga::where("id", $id)->first();
        if (!$olahraga) return response()->json(["message" => "Invalid olahraga id!"]);

        if ($olahraga) return response()->json([
            "message" => "Olahraga show success",
            "olahraga" => $olahraga,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Olahraga $olahraga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Olahraga $olahraga, $id)
    {
        $validator = Validator::make($request->all(), [
            "olahraga" => "required|string|unique:olahragas",
        ]);

        if ($validator->fails()) return response()->json([
            "message" => "Invalid field",
            "errors" => $validator->errors(),
        ]);

        $olahraga = Olahraga::where("id", $id)->first();
        if (!$olahraga) return response()->json(["message" => "Invalid olahraga id!"]);

        $olahraga = $olahraga->update([
            "olahraga" => $request->olahraga,
        ]);

        if ($olahraga) return response()->json([
            "message" => "Olahraga update success",
            "olahraga" => Olahraga::where("id", $id)->first(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Olahraga $olahraga, $id)
    {
        $olahraga = Olahraga::where("id", $id)->delete();
        if (!$olahraga) return response()->json(["message" => "Invalid olahraga id!"]);

        if ($olahraga) return response()->json(["message" => "Olahraga destroy success"]);
    }
}
