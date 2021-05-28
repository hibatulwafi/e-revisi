<html>
<head>
    <title>Hasil Revisi</title>
        <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">

</head>
<body>


<section class="content">
      

          <div class="row invoice-info">
            <div class="col-sm-12 invoice-col">
            <table border="0">
                <tr>    
                  <td>Judul TA </td> <td>:</td> <td>{{$judul}}</td>
                </tr> 

                <tr>    
                  <td>Nama Mahasiswa </td> <td>:</td> <td>{{$mahasiswa}}</td>
                </tr> 

                <tr>    
                  <td>No Induk </td> <td>:</td> <td>{{$nim}}</td>
                </tr> 
            </table>
            </div>
           
          </div>

          <div class="row">
            <div class="col-xs-12 table-responsive">
              <table class="table" style="padding-top: 55px;">
                <thead>
                <tr>
                    <th width="5%">No</th>
                    <th>Deskripsi Revisi</th>
                    <th>Dosen</th>
                    <th width="5%">Status</th>
                    <th class="text-center">TTD</th>
                </tr>
                </thead>
                <tbody>
                  @php
                    $no = 1;
                    @endphp
                     @foreach($deskripsi as $dt)
                    <tr>
                        <td align="center">{{ $no++ }}</td>
                        <td>{{ $dt->deskripsi }}</td>
                        <td>{{ $dt->nama_dosen }}</td>
                        <td> 
                          <center>
                          @if($dt->status_revisi == 1)
                            <span class="badge badge-success"> Selesai </span>
                          @else
                            <span class="badge badge-warning"> Belum Selesai</span>
                          @endif
                          </center> 
                        </td>
                        <td></td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
          </div>
      </section>
    </div>

</body>
</html>