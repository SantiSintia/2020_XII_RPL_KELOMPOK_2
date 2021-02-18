<!DOCTYPE html>
<html>
<head>
    <title>Report Data</title>
</head>
<body>
<center>
<h3>Report Data Peminjman Asset</h3>
<h2>SMK MAHAPUTRA CERDAS UTAMA</h2>
</center>

<table border="1" >
  <thead>
        <tr>
            <th>No</th>
            <th>Nama Peminjam</th>
            <th>Aset Asset</th>
                                                
        </tr>
    </thead>
    <tbody>

        @foreach($list as $no =>$list)
        <tr>
            <td>{{$no+1}}</td>
            <td>{{$list->usr_name}}</td>
            <td>{{$list->ass_name}}</td>
                                                
                                              
         </tr>                                            
                                                                                    
        @endforeach                                 
        
                                            
    </tbody>
</table>


</body>
</html>
