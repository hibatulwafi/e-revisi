<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;
class PengujiController extends Controller
{
    public function index()
    {
        $data = DB::table ('tb_mahasiswa')
        ->join('tb_kelas','tb_kelas.id_kelas','tb_mahasiswa.id_kelas')
        ->join('tb_jurusan','tb_jurusan.id_jurusan','tb_kelas.id_jurusan')
        ->join('tb_judul','tb_judul.id_mahasiswa','tb_mahasiswa.id_mahasiswa')
        ->orderBy('tb_mahasiswa.nama','ASC')
        ->get();
        $data=array(
            'data' => $data,
        );
        return view ('admin.penguji.index',$data);
    }

    public function create()
    {
        $combo1 = DB::table ('tb_mahasiswa')
        ->join('users','users.user_id','tb_mahasiswa.id_mahasiswa')
        ->join('tb_kelas','tb_kelas.id_kelas','tb_mahasiswa.id_kelas')
        ->join('tb_jurusan','tb_jurusan.id_jurusan','tb_kelas.id_jurusan')
        ->join('tb_judul','tb_judul.id_mahasiswa','tb_mahasiswa.id_mahasiswa')
        ->orderBy('tb_mahasiswa.nama','ASC')
        ->groupBy('tb_mahasiswa.nama')
        ->get();

		$combo2 = DB::table ('tb_dosen')
        ->join('users','users.user_id','tb_dosen.id_dosen')
        ->orderBy('tb_dosen.nama_dosen','ASC')
        ->groupBy('tb_dosen.nama_dosen')
        ->get();

        $data=array(
            'combo1' => $combo1,
            'combo2' => $combo2,
        );

        return view ('admin.penguji.add',$data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_mahasiswa' => 'required',
            'id_dosen' => 'required'
        ]);

        $data = DB::table('tb_penguji')->insert([
                'id_mahasiswa' => $request->id_mahasiswa,
                'id_dosen' =>   $request->id_dosen,
                'status' =>  1,
                'id_revisi' =>  0,
                'created_at' => now() ]);

        return redirect()->route('admin.datapenguji')->with('status','Berhasil Menambah Data Baru');
        
    }
}
