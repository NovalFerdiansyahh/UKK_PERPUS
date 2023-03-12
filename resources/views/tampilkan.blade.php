@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Buku') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('update', $book->id_buku) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="judul"  >{{ __('Judul') }}</label>

                            <div class=" col">
                                <input id="judul" type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" value="{{ old('judul', $book->judul) }}" required autocomplete="judul" autofocus>

                                @error('judul')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pengarang"  >{{ __('Pengarang') }}</label>

                            <div class=" col">
                                <input id="pengarang" type="text" class="form-control @error('pengarang') is-invalid @enderror" name="pengarang" value="{{ old('pengarang', $book->pengarang) }}" required autocomplete="pengarang">

                                @error('pengarang')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="penerbit"  >{{ __('Penerbit') }}</label>

                            <div class=" col">
                                <input id="penerbit" type="text" class="form-control @error('penerbit') is-invalid @enderror" name="penerbit" value="{{ old('penerbit', $book->penerbit) }}" required autocomplete="penerbit">

                                @error('penerbit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gambar"  >{{ __('Gambar') }}</label>

                            <div class=" col">
                                @if ($book->gambar)
                                    <img src="{{ asset('storage/' . $book->gambar) }}" alt="{{ $book->judul }}" width="150">
                                @else
                                <img class="img-preview img-fluid">
                                @endif
                                <input id="image" type="file" class="form-control-file @error('gambar') is-invalid @enderror d-block mb-2 mt-2" id="imageInput" name="image">

                                @error('gambar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class=" col ">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
  function previewImage() {
    const image = document.querySelector('#imageInput');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onLoad = function(oFREvent) {
      imgPreview.src = oFREvent.target.result;
    }
  }
  
</script>
@endsection