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
                      <div class="col">
                      <h4 class="card-title">Deskripsi : {{$deskripsi}}</h4>
                      </div>
                      <div class="col text-right">
                      @if($id_dosen == Auth::user()->user_id)
                        <form action="{{route('acc') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input class="form-control" type="hidden" name="id_detail" value="{{$id_detail}}">
                        <input type="submit" value="Terima Revisi" class="btn btn-primary ">
                        </form> 
                      @endif              
                      </div>
                    </div>

                    <div class="row mb-3">
                      <div class="col-12">
                      </br>
                      <hr>
                      </div>
                      <div class="col">
                        <h5>Riwayat File Revisi</h4>
                      </div>
                    </div>

                    <div class="table-responsive">
                      <table class="table table-striped " >
                        <thead>
                          <tr>
                            <th width="5%">No</th>
                            <th>Deskripsi Revisi</th>
                            <th>File</th>
                            <th>Keterangan</th>
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
                                <td>{{ $dt->keterangan }}</td>
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
                                  <a href="{{ route('dosen.rejectfile',['id'=>$dt->id_file]) }}" class="btn btn-danger btn-sm">
                                    <i class="mdi mdi-cancel"></i>
                                  </a>
                                </div>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <a href="{{ route('dosen.accfile',['id'=>$dt->id_file]) }}" class="btn btn-success btn-sm">
                                    <i class="mdi mdi-check-circle-outline"></i>
                                  </a>
                                </div>

                                <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target=".modal-{{$dt->id_file}}">
                                 <i class="mdi mdi-eye"></i>
                                </button>
                                </div>

                                <div class="modal fade modal-{{$dt->id_file}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                   <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                         Coming Soon
                                        <div class="modal-footer">

                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                      </div>
                                    </div>
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
