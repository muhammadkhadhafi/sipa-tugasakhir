@extends('layouts.mahasiswa.main')

@section('container')
  <h1 class="h3 mb-3">Pembayaran</h1>

  <div class="card shadow mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h6 class="m-0 font-weight-bold text-primary text-uppercase">Tambah Pembayaran</h6>
    </div>
    <div class="card-body">
      <form action="/mahasiswa/pembayaran" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-lg-12">
            <div class="mb-3">
              <label for="id_kategoripembayaran" class="form-label">Kategori Pembayaran</label>
              <select class="form-control @error('id_kategoripembayaran') ? 'is-invalid' : '' @enderror"
                id="id_kategoripembayaran" name="id_kategoripembayaran">
                @foreach ($list_kategoripembayaran as $kategori)
                  <option value="{{ $kategori->id }}" data-harga="{{ $kategori->harga }}">
                    {{ $kategori->kategori_pembayaran }}</option>
                @endforeach
              </select>
              @error('id_kategoripembayaran')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="mb-3">
              <label for="harga" class="form-label">Harga</label>
              <p class="form-control" id="harga"></p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <button class="btn btn-primary btn-sm float-end float-right"><i class="far fa-save"></i>
              Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <script>
    // Mendapatkan elemen select kategori pembayaran
    var selectKategori = document.getElementById('id_kategoripembayaran');

    // Mendapatkan elemen p untuk menampilkan harga
    var hargaElement = document.getElementById('harga');

    // Mendapatkan harga awal dari opsi terpilih saat halaman dimuat
    var hargaAwal = selectKategori.options[selectKategori.selectedIndex].getAttribute('data-harga');

    // Mengatur teks pada elemen p dengan harga awal
    hargaElement.textContent = hargaAwal;

    // Menambahkan event listener pada perubahan select kategori pembayaran
    selectKategori.addEventListener('change', function() {
      // Mendapatkan harga yang terkait dengan kategori yang dipilih
      var harga = selectKategori.options[selectKategori.selectedIndex].getAttribute('data-harga');

      // Mengatur teks pada elemen p dengan harga yang terkait
      hargaElement.textContent = harga;
    });
  </script>
@endsection
