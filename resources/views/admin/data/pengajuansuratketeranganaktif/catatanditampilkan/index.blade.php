@extends('layouts.admin.main')

@section('container')
  <h1 class="h3 mb-3">Surat Keterangan Aktif</h1>

  @include('layouts.utils.notif')

  <div class="row">
    <div class="col-lg-7">
      <div class="card shadow m-0 mb-4">
        <div class="card-header justify-content-between d-flex align-items-center">
          <h6 class="m-0 font-weight-bold text-primary text-uppercase">Catatan Ditampilkan</h6>
        </div>
        <div class="card-body">
          <dl>
            <dt>Kontak Admin</dt>
            <dd>{{ $catatan->kontak_admin }}</dd>
          </dl>
        </div>
      </div>
    </div>

    <div class="col-lg-5">
      <div class="card shadow m-0 mb-4">
        <div class="card-header justify-content-between d-flex align-items-center">
          <h6 class="m-0 font-weight-bold text-primary text-uppercase">Edit Catatan</h6>
        </div>
        <div class="card-body">
          <div class="row mb-2">
            <div class="col-lg-12">
              <form action="{{ url('admin/pengajuansuratketeranganaktif/catatanditampilkan') }}" method="post">
                @csrf
                <div class="form-group">
                  <label for="kontak_admin" class="form-label">Kontak Admin</label>
                  <input type="text" name="kontak_admin" id="kontak_admin"
                    class="form-control @error('kontak_admin') is-invalid @enderror" value="{{ $catatan->kontak_admin }}">
                  @error('kontak_admin')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <button type="submit" class="btn btn-sm btn-primary float-right"><i class="far fa-save fa-sm"></i>
                  Simpan</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
