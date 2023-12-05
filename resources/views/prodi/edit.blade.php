@extends('layout.main')
@section('title', 'Falkutas')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" method="POST" action="{{ route('prodi.update', $prodi->id) }}">
                        @csrf
                        @method('patch')
                        <h4 class="card-title">Ubah Prodi</h4>
                        <p class="card-description">
                            ubah prodi
                        </p>
                        <input type="text" class="form-control" placeholder="Tulis Prodi" name="nama" value="{{ $prodi->nama}}">
                        <hr>
                        <h4 class="card-title">Pilih Fakultas</h4>
                        <label for="nama">Nama Program Studi</label>
                        <select name="fakultas_id" class="form-control">
                            <option value="">Pilih</option>
                            @foreach ($fakultas as $item)
                                <option value="{{ $item->id }}"
                                    @if (old('fakultas_id', $prodi->falkutas_id)== $item['id'])
                                        selected
                                    @endif>
                                {{ $item->nama}}
                                </option>
                            @endforeach
                        </select>
                        @error('fakultas_id')
                            <label class="text-danger">{{ $message }}</label>
                        @enderror
                        <br>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ url('prodi') }}" class="btn btn-light">Batal</a>
                    </form>
                </div>
            </div>

        </div>
    </div>
    </div>
@endsection
