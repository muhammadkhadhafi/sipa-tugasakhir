@extends('layouts.admin.main')

@section('container')
  <h1 class="h3 mb-3">Pembayaran</h1>

  @include('layouts.utils.notif')

  <div class="card shadow m-0 mb-4">
    <div class="card-header justify-content-between d-flex align-items-center">
      <h6 class="m-0 font-weight-bold text-primary text-uppercase">Pembayaran Masuk</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
          <thead class="bg-gradient-primary text-light text-uppercase">
            <th width="15px">No</th>
            <th width="130px">Aksi</th>
            <th width="170px">Tanggal</th>
            <th>Kategori</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Program Studi</th>
          </thead>
          <tbody>
            @foreach ($list_pembayaranmasuk as $pembayaranmasuk)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                  <div class="btn-group">
                    <a href="{{ url('admin/pembayaran/pembayaranmasuk/' . $pembayaranmasuk->id) }}"
                      class="btn btn-sm btn-primary"><i class="fas fa-info"></i> Detail Pembayaran</a>
                  </div>
                </td>
                <td>{{ $pembayaranmasuk->tanggalDitambahkanString }}</td>
                <td>{{ $pembayaranmasuk->kategoriPembayaran->kategori_pembayaran }}</td>
                <td>{{ $pembayaranmasuk->mahasiswa->nim }}</td>
                <td>{{ $pembayaranmasuk->mahasiswa->nama }}</td>
                <td>{{ $pembayaranmasuk->mahasiswa->program_studi }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
