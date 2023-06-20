@extends('layouts.mahasiswa.main')

@section('container')
  <h1 class="h3 mb-3">Pembayaran</h1>

  <div class="row">
    <div class="col-lg-5">
      <div class="card shadow m-0 p-0 mb-4">
        <div class="card-header justify-content-between d-flex align-items-center">
          <h6 class="m-0 font-weight-bold text-primary text-uppercase">Detail Pembayaran</h6>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-12">
              <dl>
                <dt>Nama</dt>
                <dd>{{ $pembayaran->mahasiswa->nama }}</dd>
                <dt>Kategori Pembayaran</dt>
                <dd>{{ $pembayaran->kategoriPembayaran->kategori_pembayaran }}</dd>
                <dt>Total Harga</dt>
                <dd>@rupiah($pembayaran->kategoriPembayaran->harga)</dd>
                <dt>Waktu Checkout</dt>
                <dd>{{ $pembayaran->waktuDitambahkanString }}</dd>
                <dt>Status pembayaran</dt>
                <dd>
                  @if ($pembayaran->status == 'Unpaid')
                    <span class="badge badge-secondary p-1">Unpaid</span>
                  @elseif($pembayaran->status == 'Paid')
                    <span class="badge badge-success p-1">Paid</span>
                  @endif
                </dd>
              </dl>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 d-flex">
              @if ($pembayaran->status == 'Paid')
                <button class="btn btn-sm btn-primary float-right mt-0 flex-fill" id="pay-button"><i
                    class="fas fa-credit-card fa-sm"></i> Pembayaran Sukses</button>
              @else
                <button class="btn btn-sm btn-primary float-right mt-0 flex-fill" id="pay-button"><i
                    class="fas fa-credit-card fa-sm"></i> Bayar
                  Sekarang</button>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
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
@endsection
