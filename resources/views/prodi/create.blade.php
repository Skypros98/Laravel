@extends('layout.main')
@section('title', 'Tambah Prodi')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Tambah Program Studi</h4>
                      <p class="card-description">
                        Formulir tambah Program Studi
                      </p>

                    <form class="forms-sample" method="POST" action="{{ route('prodi.store') }}"> @csrf
                    <div class="form-group">
                      <label for="nama">Nama Program Studi</label>
                      <input type="text" class="form-control" name="nama" placeholder="Nama Program Studi">
                      @error('nama')
                            <label class="text-danger">{{ $message }}</label>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="fakultas_id">Nama Fakultas</label>
                      <select type="text" class="form-control" name="fakultas_id" placeholder="Nama Fakultas">
                        <option value="">Pilih</option>
                        @foreach ($fakultas as $item)
                            <option value="{{ $item->id }}"> {{ $item->nama }} </option>
                        @endforeach
                      </select>
                      @error('fakultas_id')
                            <label class="text-danger">{{ $message }}</label>
                      @enderror
                    <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                    <a href="{{ url('prodi') }}" class="btn btn-light">Batal</a>
                  </form>
                </div>
            </div>
        </div>
    </div>
@endsection

