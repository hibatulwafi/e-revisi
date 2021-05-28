@extends('admin.layout.app')
@section('content')
<div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> Mahasiswa </h3>
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
                      <h4 class="card-title">Data Mahasiswa</h4>
                      </div>
                      <div class="col text-right">
                      <a href="{{ route('admin.mahasiswa.create') }}" class="btn btn-primary">Tambah</a>
                      </div>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-bordered table-hovered" id="table">
                        <thead>
                          <tr>
                            <th width="5%">No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Judul</th>
                            <th>Kelas</th>
                            <th>No Telp</th>
                            <th>Alamat</th>
                            <th width="5%">Status</th>
                            <th width="15%">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($data as $dt)
                            <tr>
                                <td align="center"></td>
                                <td>{{ $dt->nim }}</td>
                                <td>{{ $dt->nama }}</td>
                                <td>{{ $dt->judul }}</td>
                                <td>{{ $dt->nama_kelas }}</td>
                                <td>{{ $dt->no_telp }}</td>
                                <td>{{ $dt->alamat }}</td>
                                <td>
                                  <center>
                                @if($dt->status == 0)
                                    <span class="badge badge-warning"> Tidak Aktif </span>
                                @elseif($dt->status == 1)
                                    <span class="badge badge-success"> Aktif </span>
                                @else
                                    <span class="badge badge-info"> Error </span>
                                @endif
                                </center>
                                </td>
                                <td align="center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <a href="{{ route('admin.mahasiswa.edit',['id'=>$dt->id_mahasiswa]) }}" class="btn btn-warning btn-sm">
                                    <i class="mdi mdi-tooltip-edit"></i>
                                  </a>
                                  <a href="{{ route('admin.mahasiswa.delete',['id'=>$dt->id_mahasiswa]) }}" onclick="return confirm('Yakin Hapus data')" class="btn btn-danger btn-sm">
                                    <i class="mdi mdi-delete-forever"></i>
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
