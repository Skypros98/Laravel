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
        @section('title', 'Prodi')
        <center>
            <h1>Halaman Program Studi</h1>
        </center>
    <hr>
@section('content')

    <table class="table table-stripped">
        <tr>
            <th>Nama Prodi</th>
            <th>Nama Fakultas</th>
        </tr>
        @foreach ($prodi as $item)
        <tr>
            <td>
                {{ $item['nama']}}
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
