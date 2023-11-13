<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
namespace App\Http\Controllers;
use App\Models\Sewa;

class HomeController extends Controller
{
    public function index()
{
    $sewas = Sewa::with('user')->get();
    return view('home', compact('sewas'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Tampilkan formulir pembuatan sewa (jika diperlukan)
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Proses penyimpanan data sewa baru ke basis data (jika diperlukan)
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Tampilkan informasi detail dari sewa dengan ID tertentu (jika diperlukan)
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Tampilkan formulir untuk mengedit data sewa (jika diperlukan)
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Proses pembaruan data sewa ke basis data (jika diperlukan)
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Proses penghapusan data sewa dari basis data (jika diperlukan)
    }
}
