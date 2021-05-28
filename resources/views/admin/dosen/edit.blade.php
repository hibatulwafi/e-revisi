@extends('admin.layout.app')
@section('content')
<div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> Edit Kelas </h3>
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
                      <h4 class="card-title">Edit Kelas</h4>
                      </div>
                      <div class="col text-right">
                      <a href="javascript:void(0)" onclick="window.history.back()" class="btn btn-primary">Kembali</a>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                                @foreach($data as $dt)
                                <form action="{{ route('admin.dosen.update',['id' => $dt->id_dosen]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                <label for="exampleInputUsername1">NIP</label>
                                <input required type="text" class="form-control" name="nip" value="{{ $dt->nip }}">
                                </div>

                                <div class="form-group">
                                <label for="exampleInputUsername1">Nama</label>
                                <input required type="text" class="form-control" name="nama_dosen" value="{{ $dt->nama_dosen }}">
                                </div>

                                <div class="form-group">
                                <label for="exampleInputUsername1">No Telp</label>
                                <input required type="text" class="form-control" name="no_telp" value="{{ $dt->no_telp }}">
                                </div>

                                <div class="form-group">
                                <label for="exampleInputUsername1">Alamat</label>
                                <textarea required type="text" class="form-control" name="alamat" >{{ $dt->alamat }}</textarea>
                                </div>

                                @endforeach

                                <div class="form-group">
                                <label for="exampleInputUsername1">Jurusan</label>

                                <select class="form-control" name="id_jurusan">
                                  @foreach($data as $dt)
                                  <option value="{{$dt->id_jurusan}}">{{$dt->jurusan}}</option>
                                  @endforeach
                                  @foreach($combo as $dt)
                                  <option value="{{$dt->id_jurusan}}">{{$dt->jurusan}}</option>
                                  @endforeach
                                </select>                                

                                </div>

                                <div class="text-right">
                                    <button type="submit" class="btn btn-success text-right">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
@endsection
