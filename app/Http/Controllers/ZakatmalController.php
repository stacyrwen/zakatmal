<?php

namespace App\Http\Controllers;

use App\Models\Zakatmal; // Pastikan model Zakatmal sudah ada
use Illuminate\Http\Request;

class ZakatmalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $zakatmals = Zakatmal::all(); // Ambil semua data dari model Zakatmal
        return view('zakatmals.index', compact('zakatmals')); // Kirim data ke view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('zakatmals.create'); // Tampilkan form untuk membuat Zakatmal baru
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jumlah' => 'required|numeric',
        ]);

        Zakatmal::create($request->all()); // Simpan data baru ke dalam database

        return redirect()->route('zakatmals.index'); // Kembali ke halaman index
    }

    /**
     * Display the specified resource.
     */
    public function show(Zakatmal $zakatmal)
    {
        return view('zakatmals.show', compact('zakatmal')); // Tampilkan detail Zakatmal
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Zakatmal $zakatmal)
    {
        return view('zakatmals.edit', compact('zakatmal')); // Tampilkan form untuk edit Zakatmal
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Zakatmal $zakatmal)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jumlah' => 'required|numeric',
        ]);

        $zakatmal->update($request->all()); // Update data di database

        return redirect()->route('zakatmals.index'); // Kembali ke halaman index
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Zakatmal $zakatmal)
    {
        $zakatmal->delete(); // Hapus data dari database

        return redirect()->route('zakatmals.index'); // Kembali ke halaman index
    }
}
