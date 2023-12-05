@extends('Layout.main')
@section('title', 'Tambah Program Studi')

@section('content')
    <h2>Program Studi</h2>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Nama Program Studi</h4>
                    <p class="card-description">
                        Formulir tambah Prodis
                    </p>

                    <form class="forms-sample" method="POST" action="{{ route('prodi.store') }}"> @csrf
                        <div class="form-group">
                            <label for="nama">Nama Program Studi</label>
                            <input type="text" class="form-control" name="nama" placeholder="Nama Prodi">
                            @error('nama')
                                <label class="text-danger"> {{ $message }}</label>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="fakultas_id">Nama Fakultas</label>
                            <select name="fakultas_id" class="form-control">
                                <option value="">Pilih</option>
                            </select>
                            @error('fakultas_id')
                                <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ url('prodi') }}" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
