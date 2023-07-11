<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Rekap Absen</title>
  <style>
    table.static {
      position: relative;
      border: 1px solid #543535;
    }
  </style>
</head>

<body>
  <div class="form-group">
    <p align="center"><b>Rekap Absen PKKMB - {{ $grup->prodi }} - {{ $grup->pkkmb_tahun }}</b></p>
    <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
      <thead>
        <tr>
          <th rowspan="2">No</th>
          <th rowspan="2">Nama</th>
          <th rowspan="2" width="100px">NIM</th>
          <th colspan="3">Jumlah</th>
          <th rowspan="2" width="80px">Persentase Kehadiran</th>
        </tr>
        <tr>
          <th>Hadir</th>
          <th>Izin</th>
          <th>Sakit</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($list_anggota as $anggota)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $anggota->nama }}</td>
            <td>{{ $anggota->nim }}</td>
            <td>{{ $anggota->pkkmbAbsen->count() }}</td>
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
