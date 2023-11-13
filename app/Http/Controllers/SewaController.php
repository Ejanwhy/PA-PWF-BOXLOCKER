<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use App\Models\Sewa;
use Illuminate\Support\Facades\Auth;


class SewaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user(); // Mengambil pengguna yang sedang login
        $sewas = $user->sewas; // Mengambil data sewa terkait dengan pengguna
        return view('sewa', compact('sewas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('sewas')->insert([
            'nama' => $request->nama,
            'user_id' => $request->user_id,
            'ukuran' => $request->ukuran,
            'durasi' => $request->durasi,
            'biaya' => $request->biaya,
            'expired' => $request->expired,
            'status' => $request->status,
        ]);

        return redirect('/sewa');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sewas = DB::table('sewas')->where('id',$id)->get();
         return view('sewa', ['sewas' => $sewas]);    
    }

    public function ambilBarang($id)
    {
        DB::table('sewas')->where('id', $id)->update(['status' => 'diambil']);
        return redirect('/sewa');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('sewas')->where('id',$id)->delete();
        return redirect('/sewa');
    }
}
