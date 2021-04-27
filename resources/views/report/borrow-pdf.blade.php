<!DOCTYPE html>
<html>
<head>
    <title>Peminjaman dan Pengembalian Asset</title>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">

</head>
<body>
<center>
<h3>Data Peminjaman dan Pengembalian Asset</h3>
</center>

    <table id="myTable" class="display nowrap" style="width:100%">
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

            @foreach($borrow as $no => $data)
                <tr align="center">
                    <td>{{$no+1}}</td>
                    <td>{{$data->UserByName}}</td>
                    <td>{{$data->std_class}}</td>
                    <td>{{$data->ass_name}}</td>
                    <td>{{$data->CreatedByName}}</td>
                    <td>{{date('d-m-Y - H:i:s', strtotime($data->CreatedAt))}}</td>
                    <td>Baik</th>
                    <td>{{$data->UpdatedByName}}</td>
                    <td>{{date('d-m-Y - H:i:s', strtotime($data->UpdatedAt))}}</td>
                    @if($data->bas_status == 3)
                        <td>Baik</td>
                        @elseif($data->bas_status == 6)
                        <td>Telah diganti</td>
                        @elseif($data->bas_status == 7)
                        <td>Telah diperbaiki</td>

                    @elseif($data->bas_status == 4)
                        <td>Rusak</td>
                    @elseif($data->bas_status == 5)
                        <td>Hilang</td>
                    @endif

                </tr>

            @endforeach


        </tbody>
    </table>
    <script type="" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="" src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script type="" src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
    <script type="" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
    <script type="" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#myTable').DataTable( {
            "searching": false,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]

        } );
    } );


    </script>

</body>
</html>
