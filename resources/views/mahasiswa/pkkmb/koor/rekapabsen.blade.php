<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Rekap Absen</title>
  <style>
    .form-group {
      margin: 5px 20px;
    }

    table.no-border {
      border: none;
    }

    table.static {
      position: relative;
    }
  </style>
</head>

<body>
  <div class="form-group">
    <table class="static no-border">
      <tbody>
        <tr>
          <td width="150px">Prodi</td>
          <td>:</td>
          <td>{{ $grup->prodi }}</td>
        </tr>
        <tr>
          <td>Tahun</td>
          <td>:</td>
          <td>{{ $grup->pkkmb_tahun }}</td>
        </tr>
        <tr>
          <td>Jumlah Pertemuan</td>
          <td>:</td>
          <td>{{ $grup->pkkmbPertemuan->count() }}</td>
        </tr>
      </tbody>
    </table>
    <table class="static" align="center" rules="all" border="1px" style="width:100%">
      <thead>
        <tr>
          <th rowspan="2">No</th>
          <th rowspan="2">Nama</th>
          <th rowspan="2" width="100px">NIM</th>
          <th colspan="4">Jumlah</th>
          <th rowspan="2" width="80px">Persentase Kehadiran</th>
        </tr>
        <tr>
          <th>H</th>
          <th>TH</th>
          <th>I</th>
          <th>S</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($list_anggota as $anggota)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $anggota->nama }}</td>
            <td>{{ $anggota->nim }}</td>
            <td>{{ $anggota->pkkmbAbsen->where('status', 'hadir')->count() }}</td>
            <td>{{ $anggota->pkkmbAbsen->where('status', 'tidak_hadir')->count() }}</td>
            <td>{{ $anggota->pkkmbIzin->where('status', 'izin')->count() }}</td>
            <td>{{ $anggota->pkkmbIzin->where('status', 'sakit')->count() }}</td>
            <td>{{ $anggota->persentaseKehadiran }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <script>
    window.print();
  </script>
</body>

</html>
