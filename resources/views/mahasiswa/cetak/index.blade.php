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
                      <div class="col-8">
                      <h4 class="card-title d-flex justify-content-start">Judul  : {{$judul}}</h4>
                      <h5>Mahasiswa  : {{$mahasiswa}} ( <font class="text-success">{{$nim}} </font>) </h5> 
                      </div>
                      <div class="col-4">
                        <p align="right">
                          <a href="{{route('cetak')}}" class="btn btn-primary " target="_blank">CETAK PDF</a>
                        </p>
                      </div>
                    <div class="table-responsive">
                      <table class="table table-hovered" >
                        <thead>
                          <tr>
                            <th width="5%">No</th>
                            <th>Deskripsi Revisi</th>
                            <th>Dosen</th>
                            <th width="5%">Status</th>
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
                                <td align="center">
                              
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
