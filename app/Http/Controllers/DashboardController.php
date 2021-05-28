<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
class DashboardController extends Controller
{
    //
    public function admin()
    {
        //ambil data data untuk ditampilkan di card pada dashboard
     /*   $pendapatan = DB::table('order')
                        ->select(DB::raw('SUM(subtotal) as penghasilan'))
                        ->where('status_order_id',5)
                        ->first();
        $transaksi = DB::table('order')
                        ->select(DB::raw('COUNT(id) as total_order'))
                        ->first();
        $pelanggan = DB::table('users')
                        ->select(DB::raw('COUNT(id) as total_user'))
                        ->where('role','=','customer')
                        ->first();
        $order_terbaru = $order = DB::table('order')
                        ->join('status_order','status_order.id','=','order.status_order_id')
                        ->join('users','users.id','=','order.user_id')
                        ->select('order.*','status_order.name','users.name as nama_pemesan')
                        ->limit(10)
                        ->get();
        $data = array(
            'pendapatan' => $pendapatan,
            'transaksi'  => $transaksi,
            'pelanggan'  => $pelanggan,
            'order_baru' => $order_terbaru
        );*/
        
        return view('admin/dashboard');
    }

    public function mahasiswa()
    {
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

        $qry = DB::table ('tb_log')->orderBy('tb_log.id_log','DESC')
        ->join('users','users.id','tb_log.to_user')
        ->where('tb_log.to_user',Auth::user()->id)
        ->get();

        $data=array(
            'data' => $qry,
            'total' => $total,
            'beres' => $beres
        );

        return view('mahasiswa/dashboard',$data);
    }

    public function dosen()
    {
        return view('dosen/dashboard');
    }
}
