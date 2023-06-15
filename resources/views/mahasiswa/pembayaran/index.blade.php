@extends('layouts.mahasiswa.main')

@section('container')
  <h1 class="h3 mb-3">Pembayaran</h1>

  @include('layouts.utils.notif')

  <div class="card shadow m-0">
    <div class="card-header justify-content-between d-flex align-items-center">
      <h6 class="m-0 font-weight-bold text-primary text-uppercase">Pembayaran</h6>
      <a href="/mahasiswa/pembayaran/create" class="btn btn-sm btn-primary px-3"><i class="fas fa-plus"></i> Tambah
        Pembayaran</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
          <thead class="bg-gradient-primary text-light text-uppercase">
            <th width="15px">No</th>
            <th width="130px">Aksi</th>
            <th width="160px">Tanggal Checkout</th>
            <th>Kategori Pembayaran</th>
            <th width="80px">Status</th>
          </thead>
          <tbody>
            @foreach ($list_pembayaran as $pembayaran)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                  <div class="btn-group">
                    @if ($pembayaran->status == 'Unpaid')
                      <a href="{{ url('mahasiswa/pembayaran/' . $pembayaran->id) }}" class="btn btn-sm btn-primary"><i
                          class="fas fa-info"></i> Detail</a>
                      <form action="{{ url('mahasiswa/pembayaran/' . $pembayaran->id) }}" method="post"
                        onclick="return confirm('Yakin ingin menghapus pembayaran ini?')">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-danger" style="border-radius: 0 3px 3px 0"><i
                            class="far fa-trash-alt"></i>
                          Hapus</button>
                      </form>
                    @else
                      <a href="{{ url('mahasiswa/pembayaran/' . $pembayaran->id) }}" class="btn btn-sm btn-primary"><i
                          class="fas fa-info"></i> Detail Pembayaran</a>
                    @endif
                  </div>
                </td>
                <td>{{ $pembayaran->tanggalDitambahkanString }}</td>
                <td>{{ $pembayaran->kategoriPembayaran->kategori_pembayaran }}</td>
                <td>
                  @if ($pembayaran->status == 'Unpaid')
                    <span class="badge badge-secondary p-1">Unpaid</span>
                  @elseif($pembayaran->status == 'Paid')
                    <span class="badge badge-success p-1">Paid</span>
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
