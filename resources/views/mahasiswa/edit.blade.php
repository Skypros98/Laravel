@extends('layout.main')
@section('title', 'Mahasiswa')

@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary btn-rounded btn-fw">Tambah</a>

                <div class="card-body">
                    <h4 class="card-title">Mahasiswa</h4>

                    <p class="card-description">
                        nama mahasiswa di Universitas UMDP
                    </p>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>NPM</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>tempat_lahir</th>
                                    <th>tanggal lahir</th>
                                    <th>foto</th>
                                    <th>Nama Prodi</th>
                                    <th>Nama Fakultas</th>
                                    <th>Aksi</th>
                                </tr>
                                @foreach ($mahasiswas as $item)
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $item['npm'] }} </td>
                                    <td>{{ $item['nama'] }} </td>
                                    <td>{{ $item['tempat_lahir'] }} </td>
                                    <td>{{ $item['tanggal_lahir'] }} </td>
                                    <td> <img src="foto/{{ $item['foto'] }}" class="rounded-circle" width="70px">
                                    </td>
                                    <td>{{ $item['prodi']['nama'] }} </td>
                                    <td>{{ $item['prodi']['fakultas']['nama'] }} </td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ route('mahasiswa.edit', $item->id) }}">
                                                <button class="btn btn-success btn-sm mx-3">
                                                    Edit
                                                </button>
                                            </a>
                                            <form action="{{ route('mahasiswa.destroy', $item->id) }}" method="POST">
                                                @method('delete')
                                                @csrf
                                                <button type="submit"
                                                    class="btn btn-xs btn-danger btn-rounded show_confirm"
                                                    data-toggle="tooltip" title='Delete'
                                                    data-nama='{{ $item->nama }}'>Hapus</button>
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
        @if (Session::get('success'))
            toastr.success("{{ Session::get('success') }}");
        @endif
    </script>

@endsection
