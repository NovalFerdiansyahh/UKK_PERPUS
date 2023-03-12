<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Add;
use App\Models\Book;


class AddController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tambah');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $validatedData = $request->validate([
            'judul' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'image' => 'required|image',
        ]);

        $imageName = $request->file('image')->store('images');

        $book = new Book;
        $book->judul = $request->judul;
        $book->pengarang = $request->pengarang;
        $book->penerbit = $request->penerbit;
        $book->gambar = $imageName;
        $book->save();

        return redirect('/home')->with('success', 'Buku berhasil ditambahkan!');
    
    }

    public function tampilkandata($id_buku){
        $book = Book::find($id_buku);
        //dd($book);

        return view('tampilkan', compact('book'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_buku)
    {
        $book = Book::findOrFail($id_buku);

        return view('show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_buku)
    {
        $book = Book::findOrFail($id_buku);

        $book->judul = $request->input('judul');
        $book->pengarang = $request->input('pengarang');
        $book->penerbit = $request->input('penerbit');

        if ($request->hasFile('image')) {
            // hapus gambar lama jika ada
            if ($book->gambar) {
                Book::destroy('storage/images/'.$book->gambar);
            }

            $imageName = $request->file('image')->store('images');
            $book->gambar = $imageName;
            $book->save();
        }

        $book->save();
        return redirect('/home')->with('success', 'Buku berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_buku)
    {
        $book = Book::find($id_buku);
        $book->delete();

        return redirect('/home')->with('success', 'Buku berhasil dihapus!');
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');

        $books = Book::where('judul', 'LIKE', '%'.$searchTerm.'%')
                    ->orWhere('pengarang', 'LIKE', '%'.$searchTerm.'%')
                    ->get();

        return view('/home', compact('books'));
    }
}
