@extends('admin.layout.app')
@section('content')
<div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> Revisiku - Detail</h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
            </div>
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row mb-3">
                      <div class="col-md-12">

                      @if(count($errors) > 0)
                      <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        {{ $error }} - File tidak lebih < 5M<br/>
                        @endforeach
                      </div>
                      @endif

                      <h4 class="card-title">Deskripsi : {{$deskripsi}}</h4>

                      <form action="{{route('upload') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">File</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" name="file">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Keteragan</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="hidden" name="id_detail" value="{{$id_detail}}">
                                <input class="form-control" type="text" placeholder="Keterangan" name='keterangan' >
                            </div>
                        </div>

                        <input type="submit" value="Upload" class="btn btn-primary ">

                      </form>

                      <hr class="my-4" >

                      Riwayat

                      </div>
                      <div class="col text-right">
                      </div>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-striped " >
                        <thead>
                          <tr>
                            <th width="5%">No</th>
                            <th>Deskripsi Revisi</th>
                            <th>File</th>
                            <th>Komentar</th>
                            <th width="5%">Status</th>
                            <th width="15%">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>

                            @php
                            $no = 1;
                            @endphp
                            
                          @foreach($data as $dt)
                            <tr>
                                <td align="center">{{ $no++ }}</td>
                                <td>{{ $dt->deskripsi }}</td>
                                <td><a href="{{url($dt->path."/".$dt->nama_file)}}"> {{ $dt->nama_file }} </a> </td>
                                <td>{{ $dt->komentar }}</td>
                                <td> 
                                  <center>
                                  @if($dt->status_file == 0)
                                    <span class="badge badge-info"> Sedang Ditinjau </span>
                                  @elseif($dt->status_file == 1)
                                    <span class="badge badge-danger"> Ditolak</span>
                                  @elseif($dt->status_file == 2)
                                    <span class="badge badge-success"> Selesai</span>
                                  @endif
                                  </center> 
                                </td>
                                <td align="center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <a href="{{ route('mahasiswa.revisiku.detail',['id'=>$dt->id_detail]) }}" class="btn btn-info btn-sm">
                                    <i class="mdi mdi-tooltip-edit"></i>
                                  </a>
                                </div>
                                </td>

                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
@endsection
