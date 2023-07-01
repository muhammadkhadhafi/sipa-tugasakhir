@extends('layouts.admin.main')

@section('container')
  <h1 class="h3 mb-3">Wisuda</h1>

  @include('layouts.utils.notif')

  <div class="card shadow mb-4">
    <div class="card-header d-flex justify-content-between align-items center">
      <h6 class="m-0 text-primary font-weight-bold text-uppercase">Wisuda Tahun</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
          <thead class="bg-gradient-primary text-light text-uppercase">
            <th width="15px">No</th>
            <th width="100px">Aksi</th>
            <th>Tahun</th>
            <th>Jumlah Peserta Wisuda</th>
          </thead>
          <tbody>
            @foreach ($list_tahunwisuda as $tahunwisuda)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td><a href="{{ url('admin/wisuda/tahunwisuda/' . $tahunwisuda->id) }}" class="btn btn-sm btn-primary"><i
                      class="fas fa-info fa-xs"></i> Detail Tahun</a></td>
                <td>{{ $tahunwisuda->tahun_wisuda }}</td>
                <td>{{ $tahunwisuda->pendaftaran->count() }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
