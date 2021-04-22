<!DOCTYPE html>
<html>
<head>
    <title>Peminjaman dan Pengembalian Asset</title>
</head>
<body>
<center>
<h3>Data Peminjaman dan Pengembalian Asset</h3>
</center>

                                    <table border="1">
                                        <thead>
                                            <tr class="text-center">
                                                <th>No</th>
                                                <th>Nama Peminjam</th>
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
                                                <tr class="text-center">
                                                    <th>{{$no+1}}</th>
                                                    <th>{{$data->UserByName}}</th>
                                                    <th>{{$data->std_class}}</th>
                                                    <th>{{$data->ass_name}}</th>
                                                    <th>{{$data->CreatedByName}}</th>
                                                    <th>{{date('d-m-Y - H:i:s', strtotime($data->CreatedAt))}}</th>
                                                    <th>Baik</th>
                                                    <th>{{$data->UpdatedByName}}</th>
                                                    <th>{{date('d-m-Y - H:i:s', strtotime($data->UpdatedAt))}}</th>
                                                    @if($data->bas_status == 3)
                                                        <th>Baik</th>
                                                        @elseif($data->bas_status == 6)
                                                        <th>Telah diganti</th>
                                                        @elseif($data->bas_status == 7)
                                                        <th>Telah diperbaiki</th>

                                                    @elseif($data->bas_status == 4)
                                                        <th>
                                                    @elseif($data->bas_status == 5)
                                                        <th>Hilang</th>
                                                    @endif

                                                </tr>

                                            @endforeach


                                        </tbody>
                                    </table>

</body>
</html>
