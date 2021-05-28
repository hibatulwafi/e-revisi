<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Validation\Rule;

class UploadController extends Controller
{
    public function proses_upload(Request $request){
         $request->validate([
			'file' => 'required|max:5100',
			'keterangan' => 'required',
			'id_detail' => 'required',
		]);
		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('file');
 		// nama file
		$nama_file = time()."_".$file->getClientOriginalName();
      	// real path
		$path = $file->getRealPath();
      	// ukuran file
		$size = $file->getSize();
		$tujuan_upload = 'upload/'.Auth::user()->name;
        // upload file
		$data = DB::table('tb_file')->insert([
                'id_detail' => $request->id_detail,
                'nama_file' => $nama_file,
                'path' => $tujuan_upload,
                'size' => $size,
                'keterangan' => $request->keterangan,
                'status_file' => 0,
                'created_at' => now()

                ]);

		if($data){
			$file->move($tujuan_upload,$nama_file);
		}else{
			echo "gagal";
		}

        return redirect()->back();
	}
}
