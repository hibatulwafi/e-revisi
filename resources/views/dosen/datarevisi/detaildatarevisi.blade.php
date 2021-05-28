@extends('admin.layout.app')
@section('content')
<div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> Revisiku </h3>
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
                      @php
                      if($beres > 0 && $total > 0){
                        function percentageOf( $beres, $total, $decimals = 0 ){
                            return round( $beres / $total * 100, $decimals );
                        }
                      $percen = percentageOf( $beres, $total );
                      }else{
                      $percen = 0;
                      }

                      @endphp
                      <h4 class="card-title d-flex justify-content-start">Progres Revisiku ({{$beres}}/{{$total}})</h4>
                      <div class="progress">
                        <div class="progress-bar progress-bar-striped" style="width:{{$percen}}%">{{$percen}}%</div>
                      </div>

                      </div>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-bordered table-hovered" id="table">
                        <thead>
                          <tr>
                            <th width="5%">No</th>
                            <th>Deskripsi Revisi</th>
                            <th>Dosen</th>
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
                                <td align="center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <a href="{{ route('dosen.filedatarevisi',['id'=>$dt->id_detail]) }}" class="btn btn-info btn-sm">
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
