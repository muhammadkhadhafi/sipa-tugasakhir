@extends('layouts.admin.main')

@section('container')
  <h1 class="h3 mb-3">PKKMB</h1>

  @include('layouts.utils.notif')

  <div class="card shadow m-0 mb-4">
    <div class="card-header justify-content-between d-flex align-items-center">
      <h6 class="m-0 font-weight-bold text-primary text-uppercase">Grup</h6>
      <form action="{{ url('/admin/pkkmb/absen') }}" method="post"
        onsubmit="return confirm('Yakin ingin mengelompokkan semua mahasiswa yang belum memiliki kelompok?')">
        @csrf
        <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-layer-group fa-sm"></i>
          Kelompokkan Mahasiswa</button>
      </form>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
          <thead class="bg-gradient-primary text-light text-uppercase">
            <th width="15px">No</th>
            <th width="80px">Aksi</th>
            <th>Tahun</th>
            <th>Program Studi</th>
            <th>Jumlah Anggota</th>
            <th>Jumlah Pertemuan</th>
          </thead>
          <tbody>
            @foreach ($list_pkkmb_grup as $grup)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                  <div class="btn-group">
                    <a href="{{ url('/admin/pkkmb/absen/detailgrup/' . $grup->id) }}" class="btn btn-sm btn-primary"><i
                        class="fas fa-info fa-xs"></i> Detail Grup</a>
                  </div>
                </td>
                <td>{{ $grup->pkkmb_tahun }}</td>
                <td>{{ $grup->prodi }}</td>
                <td>{{ $grup->mahasiswa->count() }}</td>
                <td>{{ $grup->pkkmbPertemuan->count() }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
