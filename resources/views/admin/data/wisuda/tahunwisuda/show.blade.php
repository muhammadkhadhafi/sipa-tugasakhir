@extends('layouts.admin.main')

@section('container')
  <h1 class="h3 mb-3">Wisuda</h1>

  <div class="row">
    <div class="col-lg-12">
      <div class="card shadow m-0 mb-4">
        <div class="card-header justify-content-between d-flex align-items-center">
          <h6 class="m-0 font-weight-bold text-primary text-uppercase">Detail Peserta Wisuda Tahun {{ $tahun_wisuda }}</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
              <thead class="bg-gradient-primary text-light text-uppercase">
                <th width="15px">No</th>
                <th width="100px">Aksi</th>
                <th width="80px">NIM</th>
                <th>Nama</th>
                <th>Program Studi</th>
                <th width="180px">Status Pembayaran</th>
              </thead>
              <tbody>
                @foreach ($list_pendaftaran as $pendaftaran)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><a href="{{ url('admin/wisuda/tahunwisuda/peserta/' . $pendaftaran->id) }}"
                        class="btn btn-sm btn-primary"><i class="fas fa-info fa-xs"></i> Detail Peserta</a></td>
                    <td>{{ $pendaftaran->mahasiswa->nim }}</td>
                    <td>{{ $pendaftaran->mahasiswa->nama }}</td>
                    <td>{{ $pendaftaran->mahasiswa->prodi->nama }}</td>
                    @if (!$pendaftaran->pembayaran)
                      <td><span class="badge badge-secondary p-1">Belum melakukan pembayaran</span></td>
                    @else
                      <td>{!! $pendaftaran->pembayaran->statusPembayaranString !!}</td>
                    @endif
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
