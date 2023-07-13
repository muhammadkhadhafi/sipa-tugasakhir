@extends('layouts.admin.main')

@section('container')
  <h1 class="h3 mb-3">PKKMB</h1>

  @include('layouts.utils.notif')

  <div class="card shadow m-0 mb-4">
    <div class="card-header justify-content-between d-flex align-items-center">
      <h6 class="m-0 font-weight-bold text-primary text-uppercase">Grup</h6>
    </div>
    <div class="card-body">
      <dl>
        <dt>Program Studi</dt>
        <dd>{{ $grup->prodi }}</dd>
        <dt>Tahun PKKMB</dt>
        <dd>{{ $grup->pkkmb_tahun }}</dd>
        <div class="row">
          <div class="col-lg-6">
            <dt>Koordinator 1</dt>
            @if ($grup->is_koor_1)
              @foreach ($list_kating as $kating)
                @if ($kating->id == $grup->is_koor_1)
                  <dd>{{ $kating->nama }}</dd>
                @endif
              @endforeach
            @else
              <dd>Belum ada koordinator 1</dd>
            @endif
            <dd>
              <form action="{{ url('/admin/pkkmb/absen/detailgrup/setkoor1/' . $grup->id) }}" method="post">
                @csrf
                @method('put')
                <select name="is_koor_1" id="is_koor_1" class="form-control">
                  <option selected disabled>Pilih Koordinator 1</option>
                  @foreach ($list_kating as $kating)
                    <option value="{{ $kating->id }}">{{ $kating->nama }}</option>
                  @endforeach
                </select>
                <button type="submit" class="btn btn-sm btn-primary float-right mt-2"><i class="far fa-save fa-sm"></i>
                  Simpan</button>
              </form>
            </dd>
          </div>
          <div class="col-lg-6">
            <dt>Koordinator 2</dt>
            @if ($grup->is_koor_2)
              @foreach ($list_kating as $kating)
                @if ($kating->id == $grup->is_koor_2)
                  <dd>{{ $kating->nama }}</dd>
                @endif
              @endforeach
            @else
              <dd>Belum ada koordinator 2</dd>
            @endif
            <dd>
              <form action="{{ url('/admin/pkkmb/absen/detailgrup/setkoor2/' . $grup->id) }}" method="post">
                @csrf
                @method('put')
                <select name="is_koor_2" id="is_koor_2" class="form-control">
                  <option selected disabled>Pilih Koordinator 2</option>
                  @foreach ($list_kating as $kating)
                    <option value="{{ $kating->id }}">{{ $kating->nama }}</option>
                  @endforeach
                </select>
                <button type="submit" class="btn btn-sm btn-primary float-right mt-2"><i class="far fa-save fa-sm"></i>
                  Simpan</button>
              </form>
            </dd>
          </div>
        </div>

        <hr>

        <div class="row">
          <div class="col-lg-6">
            <dt>Link Sertifikat PKKMB</dt>
            <dd>
              @if ($grup->link_sertifikat)
                <a href="{{ $grup->link_sertifikat }}" target="_blank">{{ $grup->link_sertifikat }}</a>
              @else
                Belum ada link sertifikat yang diunggah
              @endif
            </dd>
          </div>
          <div class="col-lg-6"></div>
        </div>
        <hr>
        <div class="row mt-3">
          <div class="col-lg-12">
            <form action="{{ url('/admin/pkkmb/absen/detailgrup/sertifikatpkkmb') }}" method="post"
              enctype="multipart/form-data" onsubmit="return confirm('Yakin ingin upload link sertifikat PKKMB?')">
              @csrf
              <div class="row">
                <div class="col-lg-6">
                  <label for="link_sertifikat" class="form-label">Upload Link Sertifikat PKKMB</label>
                  <input type="hidden" name="id_pkkmb_grup" value="{{ $grup->id }}">
                  <input type="text" name="link_sertifikat" id="link_sertifikat"
                    class="form-control @error('link_sertifikat') is-invalid @enderror">
                  @error('link_sertifikat')
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
      </dl>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <a href={{ url('/admin/pkkmb/absen/rekap-absen/' . $grup->id) }} target="_blank"
        class="btn btn-primary btn-sm float-right" style="padding: 2px 10px"><i class="fas fa-chart-line fa-sm"></i> Rekap
        Absensi</a>
    </div>
  </div>
  <div class="card shadow m-0 mb-4">
    <div class="card-header justify-content-between d-flex align-items-center">
      <h6 class="m-0 font-weight-bold text-primary text-uppercase">Data Anggota</h6>
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahAnggota"><i
          class="fas fa-plus fa-sm"></i>
        Tambah Anggota
      </button>

      <!-- Modal -->
      <div class="modal fade" id="tambahAnggota" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Anggota</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ url('/admin/pkkmb/absen/tambah-anggota/' . $grup->id) }}" method="post"
              onsubmit="return confirm('Data absensi calon anggota ini pada kelompok sebelumnya akan terhapus, apakah anda yakin ingin menambahkannya ke grup ini?')">
              @csrf
              <div class="modal-body">
                <p class="text-danger"><b>Penting</b>, pastikan bahwa calon anggota yang anda pilih tidak salah!</p>
                <select name="calon_anggota" id="calon_anggota"
                  class="form-control @error('calon_anggota') is-invalid @enderror">
                  <option selected disabled>Pilih Calon Anggota</option>
                  @foreach ($list_calon_anggota as $anggota)
                    <option value="{{ $anggota->id }}">{{ $anggota->nim }} - {{ $anggota->nama }}</option>
                  @endforeach
                </select>
                @error('calon_anggota')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i
                    class="far fa-window-close fa-sm"></i> Tutup</button>
                <button type="submit" class="btn btn-sm btn-primary"><i class="far fa-save fa-sm"></i>
                  Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
          <thead class="bg-gradient-primary text-light text-uppercase">
            <th width="15px">No</th>
            <th width="80px">NIM</th>
            <th>Nama</th>
            <th width="50px">Jumlah Hadir</th>
            <th width="50px">Persentase Kehadiran</th>
          </thead>
          <tbody>
            @foreach ($list_anggota as $anggota)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $anggota->nim }}</td>
                <td>{{ $anggota->nama }}</td>
                <td>{{ $anggota->pkkmbAbsen->where('status', 'hadir')->count() }}</td>
                <td>{{ $anggota->persentaseKehadiran }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
