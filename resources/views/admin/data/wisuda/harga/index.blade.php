@extends('layouts.admin.main')

@section('container')
  <h1 class="h3 mb-3">Wisuda</h1>

  @include('layouts.utils.notif')

  <div class="row">
    <div class="col-lg-7">
      <div class="card shadow m-0 mb-4">
        <div class="card-header justify-content-between d-flex align-items-center">
          <h6 class="m-0 font-weight-bold text-primary text-uppercase">Harga Wisuda</h6>
        </div>
        <div class="card-body">
          <dl>
            <dt>Harga Wisuda</dt>
            <dd>@rupiah($harga_wisuda->harga)</dd>
          </dl>
        </div>
      </div>
    </div>

    <div class="col-lg-5">
      <div class="card shadow m-0 mb-4">
        <div class="card-header justify-content-between d-flex align-items-center">
          <h6 class="m-0 font-weight-bold text-primary text-uppercase">Edit Harga Wisuda</h6>
        </div>
        <div class="card-body">
          <div class="row mb-2">
            <div class="col-lg-12">
              <form action="{{ url('admin/wisuda/harga') }}" method="post">
                @csrf
                @method('put')
                <div class="form-group">
                  <label for="harga" class="form-label">Harga Wisuda</label>
                  <input type="number" name="harga" id="harga"
                    class="form-control @error('harga') is-invalid @enderror" value="{{ $harga_wisuda->harga }}">
                  @error('harga')
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
