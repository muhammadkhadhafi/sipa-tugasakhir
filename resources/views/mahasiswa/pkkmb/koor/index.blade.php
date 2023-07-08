@extends('layouts.mahasiswa.main')

@section('container')
  <h1 class="h3 mb-3">Koordinator PKKMB - {{ $grup->prodi }} {{ $grup->pkkmb_tahun }}</h1>

  @include('layouts.utils.notif')

  <div class="row">
    <div class="col-lg-12">
      <a href="#" class="btn btn-primary btn-sm float-right" style="padding: 2px 10px"><i
          class="fas fa-chart-line fa-sm"></i> Rekap
        Pertemuan</a>
    </div>
  </div>
  <div class="card shadow m-0 mb-4">
    <div class="card-header justify-content-between d-flex align-items-center">
      <h6 class="m-0 font-weight-bold text-primary text-uppercase">Absensi PKKMB</h6>
      <a href="{{ url('/mahasiswa/pkkmb/koor/create') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus fa-sm"></i>
        Tambah Pertemuan</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
          <thead class="bg-gradient-primary text-light text-uppercase">
            <th width="15px">No</th>
            <th width="120px">Aksi</th>
            <th width="100px">Tanggal Pertemuan</th>
            <th>Kegiatan</th>
            <th width="80px">Jumlah Anggota Hadir</th>
          </thead>
          <tbody>
            @foreach ($list_pertemuan as $pertemuan)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                  <div class="btn-group">
                    <a href="{{ url('/mahasiswa/pkkmb/koor/detailpertemuan/' . $pertemuan->id) }}"
                      class="btn btn-sm btn-primary"><i class="fas fa-info fa-xs"></i> Detail</a>
                  </div>
                </td>
                <td>{{ $pertemuan->tanggalPertemuanString }}</td>
                <td>{{ $pertemuan->materi_kegiatan }}</td>
                <td>{{ $pertemuan->pkkmbAbsen->count() }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
