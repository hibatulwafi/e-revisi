@extends('admin.layout.app')
@section('content')
<div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> Edit Mahasiswa </h3>
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
                      <h4 class="card-title">Edit Mahasiswa</h4>
                      </div>
                      <div class="col text-right">
                      <a href="javascript:void(0)" onclick="window.history.back()" class="btn btn-primary">Kembali</a>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                                @foreach($data as $dt)
                                <form action="{{ route('admin.mahasiswa.update',['id' => $dt->id_mahasiswa]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                <label for="exampleInputUsername1">NIM</label>
                                <input required type="text" class="form-control" name="nim" value="{{ $dt->nim }}">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputUsername1">Nama</label>
                                <input required type="text" class="form-control" name="nama" value="{{ $dt->nama }}">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputUsername1">Telp</label>
                                <input required type="text" class="form-control" name="telp" value="{{ $dt->no_telp }}">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputUsername1">Alamat</label>
                                <textarea required type="text" class="form-control" name="alamat" >{{ $dt->alamat }}</textarea>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputUsername1">Judul Tugas Akhir</label>
                                <textarea required type="text" class="form-control" name="judul" >{{ $dt->judul }}</textarea>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputUsername1">Keterangan TA</label>
                                <textarea required type="text" class="form-control" name="keterangan" >{{ $dt->keterangan }}</textarea>
                                </div>
                               
                                @endforeach

                                <div class="form-group">
                                <label for="exampleInputUsername1">Kelas</label>

                                <select class="form-control" name="id_kelas">
                                  @foreach($data as $dt)
                                  <option value="{{$dt->id_kelas}}">{{$dt->nama_kelas}}</option>
                                  @endforeach
                                  @foreach($combo as $dt)
                                  <option value="{{$dt->id_kelas}}">{{$dt->nama_kelas}}</option>
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