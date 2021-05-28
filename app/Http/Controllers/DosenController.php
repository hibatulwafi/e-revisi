<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Hash;


class DosenController extends Controller
{
     public function index()
    {
        $qry = DB::table ('tb_dosen')
        ->join('tb_jurusan','tb_jurusan.id_jurusan','tb_dosen.id_jurusan')
        ->get();
        $data=array(
            'data' => $qry
        );
        return view ('admin.dosen.index',$data);
    }

    public function create()
    {  
    	$qry = DB::table ('tb_jurusan')->get();
        $data=array(
            'data' => $qry
        );
        return view('admin.dosen.add',$data);
    }

    public function store(Request $request)
    {
       
        $q=DB::table('tb_dosen')->select(DB::raw('MAX(id_dosen) as kd_max'));
        if($q->count()>0){foreach($q->get() as $k){$id_dosen = $k->kd_max+1;}
        }else{$id_dosen = "1";}


        $data = DB::table('tb_dosen')->insert([
                'id_dosen' => $id_dosen,
                'nip' =>   $request->nip,
                'nama_dosen' =>  $request->nama_dosen,
                'no_telp' =>  $request->no_telp,
                'id_jurusan' =>  $request->id_jurusan,
                'alamat' =>  $request->alamat,
                'status' =>  1,
                'created_at' => now() ]);

        $user = DB::table('users')->insert([
                'user_id' =>   $id_dosen,
                'name' =>   $request->nama_dosen,
                'email' =>   $request->username,
                'password' =>   Hash::make('password'),
                'role' =>  "dosen",
                'created_at' => now() ]);

        return redirect()->route('admin.dosen')->with('status','Berhasil Menambah Data Baru');

    }

    public function edit($id)
    { 
        $qry = DB::table ('tb_dosen')
                ->join('tb_jurusan','tb_jurusan.id_jurusan','tb_dosen.id_jurusan')
        		->where('id_dosen',$id)
        		->get();
        $combo = DB::table ('tb_jurusan')->get();

        $data=array(
            'data' => $qry,
            'combo'=> $combo
        );
        return view('admin.dosen.edit',$data);


    }

 public function update(Request $request)
    {
         
         $data = DB::table('tb_dosen')
         ->where('id_dosen',$request->id)
         ->update([
                'nip' => $request->nip,
                'nama_dosen' => $request->nama_dosen,
                'no_telp' =>   $request->no_telp,
                'id_jurusan' =>   $request->id_jurusan,
                'alamat' =>   $request->alamat,
                'updated_at' => now() ]);

        return redirect()->route('admin.dosen')->with('status','success','Sukses ubah data !');
    }

    public function delete($id)
    {
      	$hapus = DB::table('tb_dosen')->where('id_dosen',$id)->delete();
        session()->flash('success','Sukses hapus data!');
        return redirect()->back();
    }
}
