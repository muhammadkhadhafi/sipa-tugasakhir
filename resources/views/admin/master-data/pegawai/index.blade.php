@extends('layouts.admin.main')

@section('container')
  <h1 class="h3 mb-3">
    Pegawai</h1>

  @if (session()->has('success'))
    <div class=" alert alert-danger">
      {{ session('success') }}
    </div>
  @endif

  <div class="alert alert-primary">Khadafi</div>
  <div class="alert alert-primary" role="alert">
    A simple primary alert—check it out!
  </div>

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="card-title mb-0 text-uppercase">Pegawai</h5>
          <a href="/admin/master-data/pegawai/create" class="btn btn-dark"><i class="fa-solid fa-plus"></i> Tambah
            Pegawai</a>
        </div>
        <hr class="m-0">
        <div class="card-body">
          <table class="table table-bordered table-striped table-hover">
            <thead class="bg-dark text-light">
              <th>No</th>
              <th>Aksi</th>
              <th>Nama</th>
              <th>NIP</th>
            </thead>
            <tbody>
              @foreach ($pegawais as $pegawai)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td></td>
                  <td>{{ $pegawai->nama }}</td>
                  <td>{{ $pegawai->nip }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
