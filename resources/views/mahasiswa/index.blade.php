<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>
<body>
    @extends('Layout.main')
        @section('title', 'mahasiswa')
        <center>
            <h1>Halaman Mahasiswa</h1>
        </center>
    <hr>
@section('content')

    <table class="table table-stripped">
        <tr>
            <th>NPM</th>
            <th>Nama</th>
            <th>Tempat_Lahir</th>
            <th>Tanggal_Lahir</th>
            <th>Foto</th>
            <th>Prodi</th>
            <th>Fakultas</th>
        </tr>
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
    </table>

@endsection
</body>
</html>
