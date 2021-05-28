<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JurusanController extends Controller
{
  public function index()
    {
        $qry = DB::table ('tb_jurusan')->get();
        $data=array(
            'data' => $qry
        );
        return view ('admin.jurusan.index',$data);
    }

    public function create()
    {
        return view('admin.jurusan.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required',
            'jurusan' => 'required'
        ]);

        $data = DB::table('tb_jurusan')->insert([
                'kode' => $request->kode,
                'jurusan' =>   $request->jurusan,
                'status' =>  1,
                'created_at' => now() ]);

        return redirect()->route('admin.jurusan')->with('status','Berhasil Menambah Data Baru');
        
    }

    public function edit($id)
    { 
        $qry = DB::table ('tb_jurusan')
        		->where('id_jurusan',$id)
        		->get();
         $data=array(
            'data' => $qry
        );
        return view('admin.jurusan.edit',$data);
    }

    public function update(Request $request)
    {
        $request->validate([
            'kode' => 'required',
            'jurusan' => 'required'
        ]);

         $data = DB::table('tb_jurusan')
         ->where('id_jurusan',$request->id)
         ->update([
                'kode' => $request->kode,
                'jurusan' =>   $request->jurusan,
                'updated_at' => now() ]);

        session()->flash('success','Sukses ubah data !');
        return redirect()->route('admin.jurusan');
    }

    public function delete($id)
    {
      	$hapus = DB::table('tb_jurusan')->where('id_jurusan',$id)->delete();
        session()->flash('success','Sukses hapus data!');
        return redirect()->back();
    }
}
