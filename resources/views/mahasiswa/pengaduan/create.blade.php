@extends('layouts.mahasiswa.main')

@section('container')
  <h1 class="h3 mb-3">Pengaduan</h1>

  <div class="card shadow mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h6 class="m-0 font-weight-bold text-primary text-uppercase">Tambah Pengaduan</h6>
    </div>
    <div class="card-body">
      <form action="/mahasiswa/pengaduan" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-lg-12">
            <div class="mb-3">
              <label for="judul_pengaduan" class="form-label">Judul Pengaduan</label>
              <input type="text" name="judul_pengaduan" id="judul_pengaduan"
                class="form-control @error('judul_pengaduan') is-invalid @enderror">
              @error('judul_pengaduan')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="mb-3">
              <label for="deskripsi_pengaduan" class="form-label">Deskripsi Pengaduan</label>
              <input id="deskripsi_pengaduan" type="hidden" name="deskripsi_pengaduan">
              <trix-editor input="deskripsi_pengaduan"></trix-editor>
              @error('deskripsi_pengaduan')
                <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="form-group">
              <label for="" class="form-label">File Bukti Pengaduan</label>
              <div class="row">
                <div class="col-lg-6">
                  <input type="text" name="nama_bukti[]" id="nama_bukti" class="form-control" placeholder="Nama bukti">
                </div>
                <div class="col-lg-6">
                  <div class="input-group">
                    <input type="file" name="file_bukti[]" id="file_bukti" accept=".pdf, .doc, .jpg, .jpeg, .png"
                      class="form-control">
                    <button type="button" class="btn btn-primary" onclick="tambahBukti()" style="border-radius: 0 0"><i
                        class="fas fa-plus"></i></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <button class="btn btn-primary btn-sm float-end float-right"><i class="far fa-save fa-sm"></i> Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <script>
    function tambahBukti() {
      var container = document.createElement("div");
      container.classList.add("row", "mb-2", "mt-2");

      var inputCol = document.createElement("div");
      inputCol.classList.add("col-lg-6");

      var inputText = document.createElement("input");
      inputText.type = "text";
      inputText.name = "nama_bukti[]";
      inputText.id = "nama_bukti";
      inputText.classList.add("form-control");
      inputText.placeholder = "Nama bukti";

      inputCol.appendChild(inputText);
      container.appendChild(inputCol);

      var fileCol = document.createElement("div");
      fileCol.classList.add("col-lg-6");

      var fileGroup = document.createElement("div");
      fileGroup.classList.add("input-group");

      var inputFile = document.createElement("input");
      inputFile.type = "file";
      inputFile.name = "file_bukti[]";
      inputFile.id = "file_bukti";
      inputFile.accept = ".pdf, .doc, .jpg, .jpeg, .png";
      inputFile.classList.add("form-control");

      var deleteButton = document.createElement("button");
      deleteButton.type = "button";
      deleteButton.classList.add("btn", "btn-danger");
      deleteButton.onclick = function() {
        hapusBukti(this);
      };
      deleteButton.style.borderRadius = "0 0";

      var deleteIcon = document.createElement("i");
      deleteIcon.classList.add("fas", "fa-times");

      deleteButton.appendChild(deleteIcon);
      fileGroup.appendChild(inputFile);
      fileGroup.appendChild(deleteButton);
      fileCol.appendChild(fileGroup);
      container.appendChild(fileCol);

      var formGroup = document.querySelector(".form-group");
      formGroup.appendChild(container);
    }

    function hapusBukti(button) {
      var row = button.parentNode.parentNode.parentNode;
      row.parentNode.removeChild(row);
    }
  </script>
@endsection
