@extends('layout.main')
@section('title', 'Fakultas')
@section('content')

    <h2>
        Halaman Fakultas
    </h2>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Fakultas</h4>
                      <p class="card-description">
                        Daftar fakultas di Universitas MDP
                      </p>
                      <a href="{{ route('fakultas.create')}}" class="btn btn-outline-danger btn-icon-text btn-fw"><i class="mdi mdi-upload btn-icon-prepend"></i>Tambah Data</a>
                      <div class="table-responsive">
                        <table class="table table-hover table-striped">
                          <thead>
                            <tr>
                                <th>Nama Fakultas</th>
                                <th class="d-flex justify-content-center">Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($fakultas as $item)
                                <tr>
                                    <td>
                                        {{ $item['nama']}}
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                        <a href="{{ route('fakultas.edit', $item->id) }}">
                                            <button class="btn btn-primary btn-sm mx-3">Edit</button>
                                        </a>
                                        <form method="POST" action="{{ route('fakultas.destroy', $item->id) }}">
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

