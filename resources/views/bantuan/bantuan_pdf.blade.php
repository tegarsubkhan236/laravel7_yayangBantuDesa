<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Bantuan</title>
</head>
<body>
    <hr><hr>
    <h1>
        <center><font size="5" face="arial">PEMERINTAH KABUPATEN MAJALENGKA</font></center></h1>
        <center><font size="5" face="arial">KECAMATAN KERTAJATI</font></center></h1>
        <center><font size="5" face="arial">KANTOR KEPALA DESA SUKANAWA</font></center></h1>
        <center><b>Jln. Ki Bagus Rangin No. 1 Desa Sukawana - Kertajati 45457<b></center><br>
    <hr><hr>
    <center><b>LAPORAN BANTUAN<b></center><br>
    <table border="1px" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Id Bantuan</th>
                <th>NIK</th>
                <th>KK</th>
                <th>Nama</th>
                <th>Pekerjaan</th>
                <th>Penghasilan</th>
                <th>Jenis Bantuan</th>
                <th>Sasaran</th>
                <th>Kriteria</th>
                <th>Tanggal Pengajuan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bantuan as $bantuan)
            <tr>
                <td>{{ $bantuan->id }}</td>
                <td>{{ $bantuan->penduduk->nik }}</td>
                <td>{{ $bantuan->penduduk->kk }}</td>
                <td>{{ $bantuan->penduduk->nama }}</td>
                <td>{{ $bantuan->penduduk->pekerjaan }}</td>
                <td>{{ $bantuan->penduduk->penghasilan }}</td>
                <td>{{ $bantuan->jenisbantuan->nama }}</td>
                <td>{{ $bantuan->jenisbantuan->sasaran->sasaran }}</td>
                <td>{{ $bantuan->jenisbantuan->sasaran->kriteria }}</td>
                <td>{{ $bantuan->created_at->format('d-m-Y') }}</td>
                <td>{{ $bantuan->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>