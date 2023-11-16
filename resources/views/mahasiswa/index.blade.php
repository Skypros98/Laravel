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
                        Daftar Mahasiswa di Universitas MDP
                      </p>
                      <a href="{{ route('mahasiswa.create')}}" class="btn btn-primary btn-rounded btn-fw">Tambah</a>
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
                                <th>Aksi</th>
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
                                    {{ $item['prodi']['fakultas']['nama']}}
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('mahasiswa.edit', $item->id) }}">
                                            <button class="btn btn-success btn-sm">Edit</button>
                                        </a>
                                        <form method="post" action="{{ route('mahasiswa.destroy', $item->id) }}">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Hapus Data</button>
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

@section('scripts')
    <script>
            @if (Session::get(''))
                toastr.success("{{ Session::get('success') }}");
            @endif
    </script>
@endsection
