<!DOCTYPE html>
<html>
<head>
    <title>Asset Rusak</title>
</head>
<body>
<center>
<h3>Data Asset Rusak</h3>
</center>

                                    <table border="1">
                                        <thead>
                                            <tr class="text-center">
                                                <th>No</th>
                                                <th>Nama Asset</th>
                                                <th>Kode Registrasi</th>
                                                
                                            </tr>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach($assets as $no => $data)
                                                <tr class="text-center">
                                                    <td>{{$no+1}}</td>
                                                    <td>{{$data->ass_name}}</td>
                                                    <td>{{$data->ass_registration_code}}</td>
                                                </tr>

                                            @endforeach


                                        </tbody>
                                    </table>

</body>
</html>
