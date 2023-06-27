@extends('layouts.mahasiswa.main')

@section('container')
  <h1 class="h3 mb-3">Pendaftaran Wisuda</h1>

  @include('layouts.utils.notif')

  <div class="card shadow m-0 mb-4">
    <div class="card-header justify-content-between d-flex align-items-center">
      <h6 class="m-0 font-weight-bold text-primary text-uppercase">Pendaftaran Wisuda</h6>
    </div>
    <div class="card-body">
      <div class="row mb-3">
        <div class="col-lg-12">
          <table>
            <tbody>
              <tr>
                <td width="200px">Nama</td>
                <td>:</td>
                <td><b>{{ auth()->user()->nama }}</b></td>
              </tr>
              <tr>
                <td>NIM</td>
                <td>:</td>
                <td><b>{{ auth()->user()->nim }}</b></td>
              </tr>
              </tr>
              <tr>
                <td>Program Studi</td>
                <td>:</td>
                <td><b>{{ auth()->user()->prodi->nama }}</b></td>
              <tr>
                <td>Jurusan</td>
                <td>:</td>
                <td><b>{{ auth()->user()->prodi->jurusan->nama }}</b></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-lg-12">
          <table>
            <tbody>
              <tr>
                <td width="200px">Waktu Pendaftaran</td>
                <td>:</td>
                @if ($pendaftaran)
                  <td><b>{{ $pendaftaran->waktu_pendaftaran_string }}</b></td>
                @else
                  <td><b>Belum mendaftar</b></td>
                @endif
              </tr>
              <tr>
                <td>Berkas Pendaftaran Wisuda</td>
                <td>:</td>
                @if ($pendaftaran)
                  <td>
                    <a href="" target="popup"
                      onclick="window.open('{{ asset('storage/' . $pendaftaran->berkas_pendaftaran_wisuda) }}','popup','width=800,height=600'); return false;"
                      class="btn btn-sm btn-primary c-btn"><i class="fas fa-eye fa-sm"></i> Preview</a>
                  </td>
                @else
                  <td><b>Belum mendaftar</b></td>
                @endif
              </tr>
              <tr>
                <td>Status Pendaftaran</td>
                <td>:</td>
                @if ($pendaftaran)
                  <td><b>{{ $pendaftaran->statusString }}</b></td>
                @else
                  <td><b>Belum mendaftar</b></td>
                @endif
              </tr>
            </tbody>
          </table>
          @if ($pendaftaran && $pendaftaran->deskripsi_pendaftaran_ditolak)
            <div class="col-lg-7 m-auto">
              <div class="text-center">
                <h6 class="mt-2 text-center">Deskripsi Pendaftaran Ditolak</h6>
                <hr width="250px" class="mb-2 mt-0">
              </div>
              <dd class="text-center">{!! $pendaftaran->deskripsi_pendaftaran_ditolak !!}</dd>
            </div>
          @endif
        </div>
      </div>
      <hr>

      @if (!$pendaftaran || ($pendaftaran && $pendaftaran->status == 1) || ($pendaftaran && $pendaftaran->status == 3))
        <div class="row mt-3">
          <div class="col-lg-12">
            <form action="{{ url('mahasiswa/pendaftaranwisuda') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-lg-6">
                  <label for="berkas_pendaftaran_wisuda" class="form-label">Upload Berkas Pendaftaran Wisuda</label>
                  <input type="file" name="berkas_pendaftaran_wisuda" id="berkas_pendaftaran_wisuda"
                    class="form-control @error('berkas_pendaftaran_wisuda') is-invalid @enderror" accept=".pdf">
                  @error('berkas_pendaftaran_wisuda')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="col-lg-6">
                  <label for class="form-label">&nbsp;</label>
                  <button type="submit" class="btn btn-primary d-block w-100" style="font-size: 14px; height:37px"><i
                      class="far fa-save fa-sm"></i>
                    Simpan</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      @elseif($pendaftaran && $pendaftaran->status == 2)
        @if (!$pembayaran || ($pembayaran && $pembayaran->status == 1))
          <div class="row">
            <div class="col-lg-12">
              <form action="{{ url('mahasiswa/pendaftaranwisuda/pembayaran/' . $pendaftaran->id) }}" method="post"
                onclick="return confirm('Yakin ingin melakukan pembayaran?')">
                @csrf
                <button type="submit" class="btn btn-sm btn-primary float-right"><i class="fas fa-sm fa-credit-card"></i>
                  Bayar Biaya Wisuda</button>
              </form>
            </div>
          </div>
        @endif

        <div class="row mt-3">
          <div class="col-lg-12">
            <div class="table-responsive">
              <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                <thead class="text-light text-uppercase bg-gradient-primary">
                  <th width="15px">No</th>
                  <th width="190px">Aksi</th>
                  <th>Waktu Checkout</th>
                  <th>Waktu Dibayar</th>
                  <th>Harga</th>
                  <th>Status</th>
                </thead>
                <tbody>
                  @if ($pembayaran)
                    <tr>
                      <td>1</td>
                      <td>
                        @if ($pembayaran->status == 1)
                          <button class="btn btn-sm btn-primary mt-0 flex-fill" id="pay-button"><i
                              class="fas fa-credit-card fa-sm"></i> Bayar
                            Sekarang</button>
                        @else
                          <button class="btn btn-sm btn-primary mt-0 flex-fill" id="pay-button"><i
                              class="fas fa-credit-card fa-sm"></i> Pembayaran Sukses</button>
                        @endif
                      </td>
                      <td>{{ $pembayaran->waktuPembayaranString }}</td>
                      <td>
                        @if ($pembayaran->waktu_dibayar)
                          {{ $pembayaran->waktuDibayarString }}
                        @else
                          -
                        @endif
                      </td>
                      <td>@rupiah($pembayaran->harga)</td>
                      <td>{{ $pembayaran->statusPembayaranString }}</td>
                    </tr>
                  @else
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                  @endif
                </tbody>
              </table>
            </div>
          </div>
        </div>
      @endif
    </div>
  </div>





  @if ($pembayaran)
    <script type="text/javascript" src="{{ config('midtrans.snap_url') }}"
      data-client-key="{{ config('midtrans.client_key') }}"></script>
    <script type="text/javascript">
      // For example trigger on button clicked, or any time you need
      var payButton = document.getElementById('pay-button');
      payButton.addEventListener('click', function() {
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
        window.snap.pay('{{ $pembayaran->snap_token }}', {
          onSuccess: function(result) {
            /* You may add your own implementation here */
            alert("Pembayaran berhasil!");
            console.log(result);
          },
          onPending: function(result) {
            /* You may add your own implementation here */
            alert("Menunggu pembayaranmu!");
            console.log(result);
          },
          onError: function(result) {
            /* You may add your own implementation here */
            alert("Pembayaran gagal!");
            console.log(result);
          },
          onClose: function() {
            /* You may add your own implementation here */
            alert('Anda menutup popup tanpa menyelesaikan pembayaran');
          }
        })
      });
    </script>
  @endif
@endsection
