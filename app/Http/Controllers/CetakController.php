<?php

namespace App\Http\Controllers;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class CetakController extends Controller
{
    public function index()
    {

    	$judul = DB::table('tb_judul')
    	->where('id_mahasiswa',Auth::user()->user_id)
    	->first();

		$mahasiswa = DB::table('tb_mahasiswa')
    	->where('id_mahasiswa',Auth::user()->user_id)
    	->first();

     
        $dosen_penguji = DB::table('tb_penguji')
        ->join('tb_dosen','tb_dosen.id_dosen','tb_penguji.id_dosen')
        ->select('tb_dosen.nama_dosen')
        ->where('tb_penguji.id_mahasiswa',Auth::user()->user_id)
        ->get();

        $qry = DB::table ('tb_mahasiswa')
        ->join('tb_kelas','tb_kelas.id_kelas','tb_mahasiswa.id_kelas')
        ->join('tb_judul','tb_judul.id_mahasiswa','tb_mahasiswa.id_mahasiswa')
        ->join('tb_revisi','tb_revisi.id_judul','tb_judul.id_judul')
        ->join('tb_detail_revisi','tb_detail_revisi.id_revisi','tb_revisi.id_revisi')
        ->join('tb_dosen','tb_dosen.id_dosen','tb_detail_revisi.id_dosen')
        ->where('tb_mahasiswa.id_mahasiswa',Auth::user()->id)
        ->select('tb_detail_revisi.deskripsi','tb_dosen.nama_dosen','tb_detail_revisi.status_revisi')
        ->get();/*

    	echo $judul->judul;
    	echo "</br>";
    	echo $mahasiswa->nim;
    	echo "</br>";
    	echo $mahasiswa->nama;
    	echo "</br>";
    	echo $dosen_penguji;
    	echo "</br>";
    	echo $qry;
*/
        $data=array(
        	'judul' => $judul->judul,
        	'mahasiswa' => $mahasiswa->nama,
        	'nim' => $mahasiswa->nim,
            'deskripsi' => $qry
        );
        return view ('mahasiswa.cetak.index',$data); 
    }

    public function cetak()
    {

    	$judul = DB::table('tb_judul')
    	->where('id_mahasiswa',Auth::user()->user_id)
    	->first();

		$mahasiswa = DB::table('tb_mahasiswa')
    	->where('id_mahasiswa',Auth::user()->user_id)
    	->first();

     
        $dosen_penguji = DB::table('tb_penguji')
        ->join('tb_dosen','tb_dosen.id_dosen','tb_penguji.id_dosen')
        ->select('tb_dosen.nama_dosen')
        ->where('tb_penguji.id_mahasiswa',Auth::user()->user_id)
        ->get();

        $qry = DB::table ('tb_mahasiswa')
        ->join('tb_kelas','tb_kelas.id_kelas','tb_mahasiswa.id_kelas')
        ->join('tb_judul','tb_judul.id_mahasiswa','tb_mahasiswa.id_mahasiswa')
        ->join('tb_revisi','tb_revisi.id_judul','tb_judul.id_judul')
        ->join('tb_detail_revisi','tb_detail_revisi.id_revisi','tb_revisi.id_revisi')
        ->join('tb_dosen','tb_dosen.id_dosen','tb_detail_revisi.id_dosen')
        ->where('tb_mahasiswa.id_mahasiswa',Auth::user()->id)
        ->select('tb_detail_revisi.deskripsi','tb_dosen.nama_dosen','tb_detail_revisi.status_revisi')
        ->get();

        $data=array(
        	'judul' => $judul->judul,
        	'mahasiswa' => $mahasiswa->nama,
        	'nim' => $mahasiswa->nim,
            'deskripsi' => $qry
        );
        
		$pdf = PDF::loadview('mahasiswa.cetak.cetak',$data);
		return $pdf->download('laporan-revisi-'.$mahasiswa->nama);
    }
}

