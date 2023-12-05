@extends('Layout.main')
@section('title', 'prodi')
@section('content')
    <h2>Halaman Prodi</h2>
    <table class="table table-stripped">

    </table>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Nama Prodi</h4>
                    <p class="card-description">
                        Daftar Program Studi
                    </p>
                    <a href="{{ route('prodi.create') }}" class="btn btn-primary btn-rounded btn-fw">Tambah</a>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nama Prodi</th>
                                    <th>Nama Fakultas</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach ($prodi as $item)
                                <tr>
                                    <td>
                                        {{ $item['nama'] }}
                                    </td>
                                    <td>
                                        {{ $item->fakultas['nama'] }}
                                    </td>
                                    <td>
                                        <a href={{ route('prodi.edit', $item->id) }}>
                                            <button type="submit" class="btn btn-success btn-sm">Edit</button>
                                        </a>
                                        <form method="POST" action="{{ route('prodi.destroy', $item->id) }}">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
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
