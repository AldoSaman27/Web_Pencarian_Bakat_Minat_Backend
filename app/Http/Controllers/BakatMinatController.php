<?php

namespace App\Http\Controllers;

use App\Models\BakatMinat;
use App\Models\User;
use App\Models\siswa;


use Illuminate\Http\Request;

class BakatMinatController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct(){
        $this->middleware("auth:sanctum");
    }

    public function index()
    {
        //
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
        $request->validate([
          
            "id_kesenian" => "required",
            "id_kat_kesenian" => "required",
            "id_olahraga" => "required",
            "id_kat_olahraga" => "required",
            "id_pres_kesenian" => "required",
            "id_pres_olahraga" => "required",
            "id_organisasi" => "required",
            "no_wa_siswa" => "required",
            "no_wa_ortu" => "required",
            "tinggi_badan" => "required",
            "berat_badan" => "required",
            "ukuran_baju" => "required",
            "karya_ilmiah" => "required",
            "alamat_lengkap" => "required",
            "jarak_kesekolah" => "required",
            "alat_transportasi" => "required",
        ]);

        $name = request()->user()->name;
        $siswa = siswa::where("nisn", $name)->first();

        $bakatminat = BakatMinat::where("id_siswa", $siswa->id)->first();
        
        if($bakatminat){
            $bakatminat->update([
                "id_kesenian"=>$request->id_kesenian,
                "id_kat_kesenian"=>$request->id_kat_kesenian,
                "id_olahraga"=>$request->id_olahraga,
                "id_kat_olahraga"=>$request->id_kat_olahraga,
                "id_pres_kesenian"=>$request->id_pres_kesenian,
                "id_pres_olahraga"=>$request->id_pres_olahraga,
                "id_organisasi"=>$request->id_organisasi,
                "no_wa_siswa"=>$request->no_wa_siswa,
                "no_wa_ortu"=>$request->no_wa_ortu,
                "tinggi_badan"=>$request->tinggi_badan,
                "berat_badan"=>$request->berat_badan,
                "ukuran_baju"=>$request->ukuran_baju,
                "karya_ilmiah"=>$request->karya_ilmiah,
                "alamat_lengkap"=>$request->alamat_lengkap,
                "jarak_kesekolah"=>$request->jarak_kesekolah,
                "alat_transportasi"=>$request->alat_transportasi,
    
            ]);
        }else{
            $bakat = BakatMinat::create([
                "id_siswa"=>$siswa->id,
                "id_kesenian"=>$request->id_kesenian,
                "id_kat_kesenian"=>$request->id_kat_kesenian,
                "id_olahraga"=>$request->id_olahraga,
                "id_kat_olahraga"=>$request->id_kat_olahraga,
                "id_pres_kesenian"=>$request->id_pres_kesenian,
                "id_pres_olahraga"=>$request->id_pres_olahraga,
                "id_organisasi"=>$request->id_organisasi,
                "no_wa_siswa"=>$request->no_wa_siswa,
                "no_wa_ortu"=>$request->no_wa_ortu,
                "tinggi_badan"=>$request->tinggi_badan,
                "berat_badan"=>$request->berat_badan,
                "ukuran_baju"=>$request->ukuran_baju,
                "karya_ilmiah"=>$request->karya_ilmiah,
                "alamat_lengkap"=>$request->alamat_lengkap,
                "jarak_kesekolah"=>$request->jarak_kesekolah,
                "alat_transportasi"=>$request->alat_transportasi,
            ]);
        }


                
        
    
        return response()->json([
           'message' => "LINK Umkm Berhasil Ditambahkan",
           'id' => $siswa->id,

        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(BakatMinat $bakatMinat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BakatMinat $bakatMinat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BakatMinat $bakatMinat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BakatMinat $bakatMinat)
    {
        //
    }
}
