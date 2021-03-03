<!DOCTYPE html>
<html>
<head>
    <title>Report Data</title>
</head>
<body>
<center>
<h3>Laporan Data Peminjman Asset</h3>
<h2>SMK MAHAPUTRA CERDAS UTAMA</h2>
</center>

                                    <table border="1">
                                        <thead>
                                            <tr class="text-center">
                                                <th>No</th>
                                                <th class="text-left">Nama Peminjam</th>
                                                <th>Kelas</th>
                                                <th>Nama Barang</th>
                                                <th>Petugas Penyarahan</th>
                                                <th>Tgl Pinjam</th>
                                                <th>Kondisi Barang</th>
                                                <th>Petugas Pengembalian</th>
                                                <th>Tgl Pengembalian</th>
                                                <th>Kondisi Barang</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach($history as $no => $data)
                                                <tr>
                                                    <th class="text-center">{{$no+1}}</th>
                                                    <th>{{$data->UserByName}}</th>
                                                    <th class="text-center">{{$data->std_class}}</th>
                                                    <th class="text-center">{{$data->ass_name}}</th>
                                                    <th class="text-center">{{$data->CreatedByName}}</th>
                                                    <th class="text-center">{{date('d-m-Y - H:i:s', strtotime($data->CreatedAt))}}</th>
                                                    <th class="text-center">Baik</th>
                                                    <th class="text-center">{{$data->UpdatedByName}}</th>
                                                    <th class="text-center">{{date('d-m-Y - H:i:s', strtotime($data->UpdatedAt))}}</th>
                                                    @if($data->bas_status == 3)
                                                        <td class="text-center">Baik</td>
                                                    @elseif($data->bas_status == 4)
                                                        <td class="text-center">Rusak</td>
                                                    @elseif($data->bas_status == 5)
                                                        <td class="text-center">Hilang</td>
                                                    @endif

                                                </tr>

                                            @endforeach


                                        </tbody>
                                    </table>

</body>
</html>
