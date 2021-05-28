@extends('admin.layout.app')
@section('content')
<div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> Dashboard - Mahasiswa</h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
            </div>
            <div class="row">
                @php 
                  function percentageOf( $beres, $total, $decimals = 0 ){
                      return round( $beres / $total * 100, $decimals );
                  }
                  $percen = percentageOf( $beres, $total )
                @endphp
              <div class="col-md-6 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                  <div class="card-body">
                    <img src="{{ asset('adminassets') }}/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Progress <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                    </h4>
                     <h2 class="mb-5">{{$percen}}%</h2>
                  </div>
                </div>
              </div>
              
              <div class="col-md-6 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                  <div class="card-body">
                    <img src="{{ asset('adminassets') }}/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Revisi Selesai <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                    </h4>
                     <h2 class="mb-5"> ({{$beres}}/{{$total}}) </h2>
                   </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Aktivitas Terbaru</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> No </th>
                            <th> Keterangan </th>
                            <th> Tanggal </th>
                          </tr>
                        </thead>

                        <tbody>
                        @php
                          $no = 1;
                        @endphp
                        @foreach($data as $dt)
                          <tr>
                            <td>{{$no++}}</td>
                            <td>{{$dt->log}} </td>
                            <td>{{$dt->created_at}} </td>
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