@extends('layouts.app')

@section('title')
    {{$book->judul}} | LibraryApp
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 mt-2 justify-content-center" >
                <div class="card">
                    <div class="card-header">{{$book->judul}}</div>

                    <div class="card-body">
                        <div class="flex justify-start items-start pb-8 mb-8 border-b-2 border-b-slate-300">
                            <img class="w-64 h-96 box-content object-cover pr-8 mr-8 border-r-2 border-r-slate-300" src="{{asset('storage/'.$book->gambar)}}" alt="" width="380">
                            <div>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>Judul</td>
                                            <td>: {{$book->judul}}</td>
                                        </tr>
                                        <tr>
                                            <td>Pengarang</td>
                                            <td>: {{$book->pengarang}}</td>
                                        </tr>
                                        <tr>
                                            <td class="pr-4">Penerbit</td>
                                            <td>: {{$book->penerbit}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        
        
        <!--<h3 class="text-2xl font-bold mb-2">"{{$book->judul}}" Description</h3>
        <p class="text-justify">{{$book->blurb}}</p>-->
    </div>
@endsection