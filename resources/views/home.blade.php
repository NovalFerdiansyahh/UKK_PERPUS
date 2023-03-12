@extends('layouts.app')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 mt-2" style="min-height: 480px;">
            <div class="card">
                <div class="card-header h3 font-weight-bold text-center">Daftar Buku</div>
           
                <div class="card-body">
                    <div class="row">
                      <div class="mb-2">
                        <div class="col">
                          <a href="/add" class="btn btn-primary">Tambah Buku</a>
                        </div>
                      </div>
                      <div class="col">
                      <form action="{{ route('add.search') }}" method="GET">
                          <div class="input-group">
                              <input type="text" class="form-control" name="search" placeholder="Cari judul buku...">
                              <span class="input-group-btn">
                                  <button type="submit" class="btn btn-default">
                                      <i class="fa fa-search"></i>
                                  </button>
                              </span>
                          </div>
                      </form>
                      </div>
                    </div>
                    
                    
                      <div class="container mt-2">
                        <div class="row">
                          @foreach ($books as $book)
                          <div class="col-md-4">
                            <div  class="card mb-4 shadow-sm" style="width: 300px;">
                            <div style="height: 395px; overflow: hidden;">
                              <img class="card-img-top" src="{{ asset('storage/'.$book->gambar) }}" alt="{{ $book->judul }}" style="object-fit: cover; height: 100%; width: 100%;" data-toggle="modal" data-target="#bookModal{{ $book->id_buku }}">
                            </div>
                            <div class="card-body" style="height: 110px;">
                              <h5 class="card-title font-weight-bold" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" data-toggle="modal" data-target="#bookModal{{ $book->id_buku }}">
                                {{ $book->judul }}
                              </h5>
                              <!-- <h5 class="card-title" style="-webkit-line-clamp: 2; display: -webkit-box; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">The King in Yellow</h5> -->
                              <div class="row">
                                <div class="m-auto">
                                  <a href="/buku/{{$book->id_buku}}" class="btn btn-primary px-4 py-2 mt-2" >Detail</a> <a href="/tampilkandata/{{$book->id_buku}}" class="btn btn-warning px-4 py-2 mt-2">Edit</a> <a href="/destroy/{{$book->id_buku}}" class="btn btn-danger px-4 py-2 mt-2">Hapus</a>
                                </div>
                                
                              </div>
                            </div>
                            </div>
                          </div>
                          @endforeach
                        </div>
                      </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>



@endsection