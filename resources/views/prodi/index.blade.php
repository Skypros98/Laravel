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
                      <div class="table-responsive">
                        <table class="table table-hover table-striped">
                          <thead>
                            <tr>
                                <th>Nama Prodi</th>
                                <th>Nama Fakultas</th>
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

