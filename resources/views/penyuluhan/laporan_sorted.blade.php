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
    <center><b>LAPORAN PENYULUHAN<b></center><br>
    <p style="text-align: center;"><strong>{{date("d-m-Y",strtotime($req->start))}} - {{date("d-m-Y",strtotime($req->end))}}</strong></p>
    <table border="1px" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Tanggal Hadir</th>
                <th>ID Bantuan</th>
                <th>Nama Bantuan</th>
                <th>Nama Penerima</th>
                <th>Tempat</th>
                <th>Tanggal Penyuluhan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penyuluhan->get() as $x)
            <tr>
                <td>{{date("d-m-Y",strtotime($x->created_at))}}</td>
                <td>{{ $x->bantuan->id }}</td>
                <td>{{ $x->bantuan->jenisbantuan->nama }}</td>
                <td>{{ $x->bantuan->penduduk->nama }}</td>
                <td>{{ $x->bantuan->jenisbantuan->tempat }}</td>
                <td>{{ $x->bantuan->jenisbantuan->tgl_penyuluhan->format('d-m-Y') }}</td>
                <td>{{ $x->status }}</td>
            </tr>
            @endforeach
        </tbody>
        </table>
</body>
</html>