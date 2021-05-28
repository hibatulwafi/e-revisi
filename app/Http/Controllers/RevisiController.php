<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;

class RevisiController extends Controller
{
   public function index()
    {
        $qry = DB::table ('tb_mahasiswa')
        ->join('tb_kelas','tb_kelas.id_kelas','tb_mahasiswa.id_kelas')
        ->join('tb_judul','tb_judul.id_mahasiswa','tb_mahasiswa.id_mahasiswa')
        ->get();

        $data=array(
            'data' => $qry
        );
        return view ('admin.revisi.index',$data);
    }

    public function revisiku()
    {
        $qry = DB::table ('tb_mahasiswa')
        ->join('tb_kelas','tb_kelas.id_kelas','tb_mahasiswa.id_kelas')
        ->join('tb_judul','tb_judul.id_mahasiswa','tb_mahasiswa.id_mahasiswa')
        ->join('tb_revisi','tb_revisi.id_judul','tb_judul.id_judul')
        ->join('tb_detail_revisi','tb_detail_revisi.id_revisi','tb_revisi.id_revisi')
        ->join('tb_dosen','tb_dosen.id_dosen','tb_detail_revisi.id_dosen')
        ->where('tb_mahasiswa.id_mahasiswa',Auth::user()->id)
        ->get();

        $beres = DB::table ('tb_mahasiswa')
        ->join('tb_kelas','tb_kelas.id_kelas','tb_mahasiswa.id_kelas')
        ->join('tb_judul','tb_judul.id_mahasiswa','tb_mahasiswa.id_mahasiswa')
        ->join('tb_revisi','tb_revisi.id_judul','tb_judul.id_judul')
        ->join('tb_detail_revisi','tb_detail_revisi.id_revisi','tb_revisi.id_revisi')
        ->join('tb_dosen','tb_dosen.id_dosen','tb_detail_revisi.id_dosen')
        ->where('tb_mahasiswa.id_mahasiswa',Auth::user()->id)
        ->where('tb_detail_revisi.status_revisi',1)
        ->count();

        $total = DB::table ('tb_mahasiswa')
        ->join('tb_kelas','tb_kelas.id_kelas','tb_mahasiswa.id_kelas')
        ->join('tb_judul','tb_judul.id_mahasiswa','tb_mahasiswa.id_mahasiswa')
        ->join('tb_revisi','tb_revisi.id_judul','tb_judul.id_judul')
        ->join('tb_detail_revisi','tb_detail_revisi.id_revisi','tb_revisi.id_revisi')
        ->join('tb_dosen','tb_dosen.id_dosen','tb_detail_revisi.id_dosen')
        ->where('tb_mahasiswa.id_mahasiswa',Auth::user()->id)
        ->count();

        $data=array(
            'data' => $qry,
            'total' => $total,
            'beres' => $beres
        );
        return view ('mahasiswa.revisiku.index',$data);
    }

    public function revisikudetail($id)
    {
        $data = DB::table ('tb_file')
        ->join('tb_detail_revisi','tb_detail_revisi.id_detail','tb_file.id_detail')
        ->where('tb_file.id_detail',$id)
        ->orderBy('tb_file.created_at','ASC')
        ->get();

        $qry = DB::table ('tb_detail_revisi')
        ->where('id_detail',$id)
        ->first();

        $deskripsi = $qry->deskripsi;
        $id_detail = $qry->id_detail;

        $data=array(
            'data' => $data,
            'deskripsi' => $deskripsi,
            'id_detail' => $id_detail

        );
        return view ('mahasiswa.revisiku.detail',$data);
    }

    public function revisibaru()
    {
        $data = DB::table ('tb_mahasiswa')
        ->join('tb_penguji','tb_penguji.id_mahasiswa','tb_mahasiswa.id_mahasiswa')
        ->join('tb_dosen','tb_dosen.id_dosen','tb_penguji.id_dosen')
        ->join('tb_kelas','tb_kelas.id_kelas','tb_mahasiswa.id_kelas')
        ->join('tb_jurusan','tb_jurusan.id_jurusan','tb_kelas.id_jurusan')
        ->join('tb_judul','tb_judul.id_mahasiswa','tb_mahasiswa.id_mahasiswa')
        ->where('tb_penguji.id_dosen',Auth::user()->user_id)
        ->orderBy('tb_mahasiswa.nama','ASC')
        ->get();
        $data=array(
            'data' => $data,
        );
        return view ('dosen.datarevisi.index',$data);
    }

    public function datarevisi()
    {
        $data = DB::table ('tb_mahasiswa')
        ->join('tb_penguji','tb_penguji.id_mahasiswa','tb_mahasiswa.id_mahasiswa')
        ->join('tb_dosen','tb_dosen.id_dosen','tb_penguji.id_dosen')
        ->join('tb_kelas','tb_kelas.id_kelas','tb_mahasiswa.id_kelas')
        ->join('tb_jurusan','tb_jurusan.id_jurusan','tb_kelas.id_jurusan')
        ->join('tb_judul','tb_judul.id_mahasiswa','tb_mahasiswa.id_mahasiswa')
        ->where('tb_penguji.id_dosen',Auth::user()->user_id)
        ->orderBy('tb_mahasiswa.nama','ASC')
        ->get();
        $data=array(
            'data' => $data,
        );
        return view ('dosen.datarevisi.datarevisi',$data);
    }

    public function detaildatarevisi($id)
    {
        
         $qry = DB::table ('tb_mahasiswa')
        ->join('tb_kelas','tb_kelas.id_kelas','tb_mahasiswa.id_kelas')
        ->join('tb_judul','tb_judul.id_mahasiswa','tb_mahasiswa.id_mahasiswa')
        ->join('tb_revisi','tb_revisi.id_judul','tb_judul.id_judul')
        ->join('tb_detail_revisi','tb_detail_revisi.id_revisi','tb_revisi.id_revisi')
        ->join('tb_dosen','tb_dosen.id_dosen','tb_detail_revisi.id_dosen')
        ->where('tb_mahasiswa.id_mahasiswa',$id)
        ->get();


        $beres = DB::table ('tb_mahasiswa')
        ->join('tb_kelas','tb_kelas.id_kelas','tb_mahasiswa.id_kelas')
        ->join('tb_judul','tb_judul.id_mahasiswa','tb_mahasiswa.id_mahasiswa')
        ->join('tb_revisi','tb_revisi.id_judul','tb_judul.id_judul')
        ->join('tb_detail_revisi','tb_detail_revisi.id_revisi','tb_revisi.id_revisi')
        ->join('tb_dosen','tb_dosen.id_dosen','tb_detail_revisi.id_dosen')
        ->where('tb_mahasiswa.id_mahasiswa',$id)
        ->where('tb_detail_revisi.status_revisi',1)
        ->count();

        $total = DB::table ('tb_mahasiswa')
        ->join('tb_kelas','tb_kelas.id_kelas','tb_mahasiswa.id_kelas')
        ->join('tb_judul','tb_judul.id_mahasiswa','tb_mahasiswa.id_mahasiswa')
        ->join('tb_revisi','tb_revisi.id_judul','tb_judul.id_judul')
        ->join('tb_detail_revisi','tb_detail_revisi.id_revisi','tb_revisi.id_revisi')
        ->join('tb_dosen','tb_dosen.id_dosen','tb_detail_revisi.id_dosen')
        ->where('tb_mahasiswa.id_mahasiswa',$id)
        ->count();

        $data=array(
            'data' => $qry,
            'total' => $total,
            'beres' => $beres
        );
        return view ('dosen.datarevisi.detaildatarevisi',$data);
    }

    public function filedatarevisi($id)
    {
        $data = DB::table ('tb_file')
        ->join('tb_detail_revisi','tb_detail_revisi.id_detail','tb_file.id_detail')
        ->where('tb_file.id_detail',$id)
        ->orderBy('tb_file.created_at','ASC')
        ->get();

        $qry = DB::table ('tb_detail_revisi')
        ->where('id_detail',$id)
        ->first();

        $deskripsi = $qry->deskripsi;
        $id_detail = $qry->id_detail;
        $id_dosen = $qry->id_dosen;

        $data=array(
            'data' => $data,
            'deskripsi' => $deskripsi,
            'id_detail' => $id_detail,
            'id_dosen' => $id_dosen

        );
        return view ('dosen.datarevisi.filedatarevisi',$data);
    }

    public function acc(Request $request)
    {
         $data = DB::table('tb_detail_revisi')
         ->where('id_detail',$request->id_detail)
         ->update([
                'status_revisi' => 1,
                'updated_at' => now() ]);

        session()->flash('success','Sukses!');
        return redirect()->route('dosen.datarevisi');
    }


    public function accfile($id)
    {
         $data = DB::table('tb_file')
         ->where('id_file',$id)
         ->update([
                'status_file' => 2,
                'komentar' => 'Selamat',
                'updated_at' => now() ]);

        session()->flash('success','Sukses!');
        return redirect()->back();
    }

    public function rejectfile($id)
    {
         $data = DB::table('tb_file')
         ->where('id_file',$id)
         ->update([
                'status_file' => 1,
                'komentar' => 'Perbaiki Lagi',
                'updated_at' => now() ]);

        session()->flash('success','Sukses!');
        return redirect()->back();
    }

}
