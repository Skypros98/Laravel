@extends('Layout.main')
@section('title', 'Prodi')
@section('content')

    <h1>
        Halaman Program Studi
    </h1>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Program Studi</h4>
                      <p class="card-description">
                        Daftar Program Studi di Universitas MDP
                      </p>
                      <a href="{{ route('prodi.create') }}" class="btn btn-outline-danger btn-icon-text btn-fw"><i class="mdi mdi-upload btn-icon-prepend"></i>Tambah Data</a>
                      <div class="table-responsive">
                        <table class="table table-hover table-striped">
                          <thead>
                            <tr>
                                <th>Nama Prodi</th>
                                <th>Nama Fakultas</th>
                                <th class="d-flex justify-content-center">Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($prodi as $item)
                            <tr>
                                <td>
                                    {{ $item['nama']}}
                                </td>
                                <td>
                                    {{ $item['fakultas']['nama']}}
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('mahasiswa.edit', $item->id) }}">
                                            <button class="btn btn-primary btn-sm mx-3">Edit</button>
                                        </a>
                                        <form method="POST" action="{{ route('prodi.destroy', $item->id) }}">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm show_confirm"
                                            data-toggle="tooltip" title="Delete"
                                            data-nama='{{ $item->nama }}'>Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
    </div>
@endsection

