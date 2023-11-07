@extends('layout.main')
@section('title', 'mahasiswa')
@section('content')

    <h1>
        Halaman Mahasiswa
    </h1>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Mahasiswa</h4>
                      <p class="card-description">
                        Daftar mahasiswa di Universitas MDP
                      </p>
                      <div class="table-responsive">
                        <table class="table table-hover table-striped">
                          <thead>
                            <tr>
                                <th>NPM</th>
                                <th>Nama</th>
                                <th>Tempat_Lahir</th>
                                <th>Tanggal_Lahir</th>
                                <th>Foto</th>
                                <th>Prodi</th>
                                <th>Fakultas</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($mahasiswa as $item)
                            <tr>
                                <td>
                                    {{ $item['npm']}}
                                </td>
                                <td>
                                    {{ $item['nama']}}
                                </td>
                                <td>
                                    {{ $item['tempat_lahir']}}
                                </td>
                                <td>
                                    {{ $item['tanggal_lahir']}}
                                </td>
                                <td>
                                    <img src="images/{{ $item['foto'] }}" class="rounded-circle" width="90px" />
                                </td>
                                <td>
                                    {{ $item['prodi']['nama']}}
                                </td>
                                <td>
                                    {{ $item['fakultas']['nama']}}
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

