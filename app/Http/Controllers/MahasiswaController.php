<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Hash;

class MahasiswaController extends Controller
{
     public function index()
    {
        $qry = DB::table ('tb_mahasiswa')
        ->join('tb_kelas','tb_kelas.id_kelas','tb_mahasiswa.id_kelas')
        ->join('tb_jurusan','tb_jurusan.id_jurusan','tb_kelas.id_jurusan')
        ->join('tb_judul','tb_judul.id_mahasiswa','tb_mahasiswa.id_mahasiswa')
        ->get();
        $data=array(
            'data' => $qry
        );
        return view ('admin.mahasiswa.index',$data);
    }

    public function create()
    {  
    	$qry = DB::table ('tb_kelas')->get();
        $data=array(
            'data' => $qry
        );
        return view('admin.mahasiswa.add',$data);
    }

    public function store(Request $request)
    {

        $q=DB::table('tb_mahasiswa')->select(DB::raw('MAX(id_mahasiswa) as kd_max'));
        if($q->count()>0){foreach($q->get() as $k){$id_mahasiswa = $k->kd_max+1;}
        }else{$id_mahasiswa = "1";}


        $data = DB::table('tb_mahasiswa')->insert([
                'id_mahasiswa' => $id_mahasiswa,
                'nim' =>   $request->nim,
                'nama' =>  $request->nama,
                'id_kelas' =>  $request->id_kelas,
                'no_telp' =>  $request->telp,
                'alamat' =>  $request->alamat,
                'status' =>  1,
                'created_at' => now() ]);

        $user = DB::table('users')->insert([
                'user_id' =>   $id_mahasiswa,
                'name' =>   $request->nama,
                'email' =>   $request->username,
                'password' =>   Hash::make('password'),
                'role' =>  "mahasiswa",
                'created_at' => now() ]);

         $judul = DB::table('tb_judul')->insert([
                'id_mahasiswa' =>   $id_mahasiswa,
                'judul' =>   $request->judul,
                'keterangan' =>   $request->keterangan,
                'created_at' => now() ]);


        return redirect()->route('admin.mahasiswa')->with('status','Berhasil Menambah Data Baru');
        
    }

    public function edit($id)
    { 
        $qry = DB::table ('tb_mahasiswa')
                ->join('tb_kelas','tb_kelas.id_kelas','tb_mahasiswa.id_kelas')
                ->join('tb_judul','tb_judul.id_mahasiswa','tb_mahasiswa.id_mahasiswa')
        		->where('tb_mahasiswa.id_mahasiswa',$id)
        		->get();
        $combo = DB::table ('tb_kelas')->get();

        $data=array(
            'data' => $qry,
            'combo'=> $combo
        );
        return view('admin.mahasiswa.edit',$data);
    }

    public function update(Request $request)
    {
         
         $data = DB::table('tb_mahasiswa')
         ->where('id_mahasiswa',$request->id)
         ->update([
                'nim' => $request->nim,
                'nama' => $request->nama,
                'id_kelas' =>   $request->id_kelas,
                'alamat' =>   $request->alamat,
                'no_telp' =>   $request->telp,
                'updated_at' => now() ]);

         $data = DB::table('tb_judul')
         ->where('id_mahasiswa',$request->id)
         ->update([
                'judul' =>   $request->judul,
                'keterangan' =>   $request->keterangan,
                'updated_at' => now() ]);

        return redirect()->route('admin.mahasiswa')->with('status','success','Sukses ubah data !');
    }

    public function delete($id)
    {
      	$hapus = DB::table('tb_mahasiswa')->where('id_mahasiswa',$id)->delete();
        return redirect()->back()->with('status','success','Sukses hapus data !');;
    }
}
