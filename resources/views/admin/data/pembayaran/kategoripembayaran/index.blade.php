@extends('layouts.admin.main')

@section('container')
  <h1 class="h3 mb-3">Pembayaran</h1>

  @include('layouts.utils.notif')

  <div class="card shadow m-0 mb-4">
    <div class="card-header justify-content-between d-flex align-items-center">
      <h6 class="m-0 font-weight-bold text-primary text-uppercase">Kategori Pembayaran</h6>
      <a href="{{ url('admin/pembayaran/kategoripembayaran/create') }}" class="btn btn-sm btn-primary"><i
          class="fas fa-plus fa-sm"></i>
        Tambah Kategori</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
          <thead class="bg-gradient-primary text-light text-uppercase">
            <th width="15px">No</th>
            <th width="125px">Aksi</th>
            <th width="160px">Tanggal</th>
            <th>Kategori Pembayaran</th>
            <th>Harga</th>
          </thead>
          <tbody>
            @foreach ($list_kategoripembayaran as $kategoripembayaran)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                  <div class="btn-group">
                    @include('layouts.utils.info', [
                        'url' => url('admin/pembayaran/kategoripembayaran'),
                        'id' => $kategoripembayaran->id,
                    ])
                    @include('layouts.utils.edit', [
                        'url' => url('admin/pembayaran/kategoripembayaran'),
                        'id' => $kategoripembayaran->id,
                    ])
                    @include('layouts.utils.delete', [
                        'url' => url('admin/pembayaran/kategoripembayaran'),
                        'id' => $kategoripembayaran->id,
                    ])
                  </div>
                </td>
                <td>{{ $kategoripembayaran->tanggal_ditambahkan_string }}</td>
                <td>{{ $kategoripembayaran->kategori_pembayaran }}</td>
                <td>@rupiah($kategoripembayaran->harga)</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
