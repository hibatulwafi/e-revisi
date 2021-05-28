<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class KelasController extends Controller
{
 public function index()
    {
        $qry = DB::table ('tb_kelas')
        ->join('tb_jurusan','tb_jurusan.id_jurusan','tb_kelas.id_jurusan')
        ->get();
        $data=array(
            'data' => $qry
        );
        return view ('admin.kelas.index',$data);
    }

    public function create()
    {  
    	$qry = DB::table ('tb_jurusan')->get();
        $data=array(
            'data' => $qry
        );
        return view('admin.kelas.add',$data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required',
            'id_jurusan' => 'required'
        ]);

        $data = DB::table('tb_kelas')->insert([
                'nama_kelas' => $request->nama_kelas,
                'id_jurusan' =>   $request->id_jurusan,
                'status' =>  1,
                'created_at' => now() ]);

        return redirect()->route('admin.kelas')->with('status','Berhasil Menambah Data Baru');
        
    }

    public function edit($id)
    { 
        $qry = DB::table ('tb_kelas')
                ->join('tb_jurusan','tb_jurusan.id_jurusan','tb_kelas.id_jurusan')
        		->where('id_kelas',$id)
        		->get();
        $combo = DB::table ('tb_jurusan')->get();

        $data=array(
            'data' => $qry,
            'combo'=> $combo
        );
        return view('admin.kelas.edit',$data);
    }

    public function update(Request $request)
    {
         $request->validate([
            'nama_kelas' => 'required',
            'id_jurusan' => 'required'
        ]);

         $data = DB::table('tb_kelas')
         ->where('id_kelas',$request->id)
         ->update([
                'nama_kelas' => $request->nama_kelas,
                'id_jurusan' =>   $request->id_jurusan,
                'updated_at' => now() ]);

        session()->flash('success','Sukses ubah data !');
        return redirect()->route('admin.kelas');
    }

    public function delete($id)
    {
      	$hapus = DB::table('tb_kelas')->where('id_kelas',$id)->delete();
        session()->flash('success','Sukses hapus data!');
        return redirect()->back();
    }
}
