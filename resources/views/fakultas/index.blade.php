@extends('Layout.main')
@section('title', 'Fakultas')
@section('content')
    <h2>Fakultas</h2>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Nama Fakultas</h4>
                    <p class="card-description">
                        Daftar Fakultas di Universitas MDP
                    </p>
                    <a href="{{ route('fakultas.create') }}" class="btn btn-primary btn-rounded btn-fw">Tambah</a>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    @foreach ($fakultas as $item)
                                <tr>
                                    <td>
                                        {{ $item['nama'] }}
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
