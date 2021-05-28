@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Revline</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Kamu Sudah Login !
                    @if(Auth::user()->role == "mahasiswa")
                    <a href="{{route('mahasiswa.dashboard')}}"> <i class="fas fa-home"></i>Kembali Ke Dashboard</a>
                    @elseif(Auth::user()->role == "dosen")
                    <a href="{{route('dosen.dashboard')}}"> <i class="fas fa-home"></i>Kembali Ke Dashboard</a>
                    @elseif(Auth::user()->role == "admin")
                    <a href="{{route('admin.dashboard')}}"> <i class="fas fa-home"></i>Kembali Ke Dashboard</a>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
