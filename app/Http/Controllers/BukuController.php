<?php

namespace App\Http\Controllers;

use App\Models\Buku;

use Illuminate\Http\Request;

//return type View
use Illuminate\View\View;

//import Facade "Storage"
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //get bukus
        $bukus = Buku::latest()->paginate(5);

        //render view with bukus
        return view('bukus.index', compact('bukus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bukus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'gambar'=> 'required|image|mimes:jpeg,jpg,png|max:2048',
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer',
        ]);

        if ($this->fails()) {
            return redirect()->route('bukus.create')
                        ->withErrors($this)
                        ->withInput();
        }

        $bukus = Buku::create($request->all());
        return redirect()->route('bukus.index')->with('success', 'Buku berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buku $buku)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        //
    }
}
