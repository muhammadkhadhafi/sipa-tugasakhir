@extends('layouts.admin.main')

@section('container')
  <h1 class="h3 mb-3">
    Pengajuan Surat Keterangan Aktif</h1>

  @include('layouts.utils.notif')

  <div class="card shadow m-0">
    <div class="card-header justify-content-between d-flex align-items-center">
      <h6 class="m-0 font-weight-bold text-primary text-uppercase">Pengajuan Selesai</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
          <thead class="bg-gradient-primary text-light text-uppercase">
            <th width="15px">No</th>
            <th width="120px">Aksi</th>
            <th width="160px">Tanggal Pengajuan</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Program Studi</th>
            <th>Status</th>
          </thead>
          <tbody>
            @foreach ($list_pengajuan as $pengajuan)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                  <div class="btn-group">
                    <a href="/admin/pengajuansuratketeranganaktif/pengajuanselesai/{{ $pengajuan->id }}"
                      class="btn btn-sm btn-primary"><i class="fas fa-info"></i> Detail Pengajuan</a>
                  </div>
                </td>
                <td>{{ $pengajuan->tanggal_pengajuan_string }}</td>
                <td>{{ $pengajuan->mahasiswa->nim }}</td>
                <td>{{ $pengajuan->mahasiswa->nama }}</td>
                <td>{{ $pengajuan->mahasiswa->program_studi }}</td>
                <td>
                  @if ($pengajuan->status == 1)
                    <span class="badge badge-primary p-1">Pengajuan diproses</span>
                  @elseif($pengajuan->status == 2)
                    <span class="badge badge-success p-1">Pengajuan selesai</span>
                  @elseif($pengajuan->status == 3)
                    <span class="badge badge-danger p-1">Pengajuan ditolak</span>
                  @endif
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
