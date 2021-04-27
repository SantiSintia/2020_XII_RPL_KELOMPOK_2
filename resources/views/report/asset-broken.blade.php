
<!DOCTYPE html>
<html>
<head>
    <title>Asset Kondisi Rusak</title>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">

</head>
<body>
<center>
<h3>Data Asset Kondisi Rusak</h3>
</center>

    <table id="myTable" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Asset</th>
                <th>Kode Registrasi</th>
                <th>Harga</th>
                <th>Material</th>
                <th>Merk</th>
                <th>Spesifikasi</th>
                <th>Voltage</th>
                <th>Kondisi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($assets as $no => $data)
            <tr align="center">
               <td>{{$no+1}}</td>
                <td>{{$data->ass_name}}</td>
                <td>{{$data->ass_registration_code}}</td>
                <td>{{$data->ass_price}}</td>
                <td>{{$data->asd_inggridient}}</td>
                <td>{{$data->asd_merk}}</td>
                <td>{{$data->asd_spesification}}</td>
                <td>{{$data->asd_voltage}}</td>
                <td>{{$data->asd_condition}}</td>
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
