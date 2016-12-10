<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use App\Http\Requests;
use App\Kegiatan;

class InformasiKegiatanController extends Controller
{
    /**
     * Display page to manage current resource.
     *
     * @return Response
     */
    public function manage()
    {
    	$kegiatan = Kegiatan::all();
        return view('pages.informasi_kegiatan')
        			->with('kegiatan', $kegiatan);
    }

    public function getModalTambahKegiatan()
    {
        return view('modal.admin.kegiatan.tambahKegiatan.formTambahKegiatan');
    }

    protected function validatorPostModalTambahKegiatan(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'date' => 'required',
            'info' => 'required',
        ]);      
    }

    public function postModalTambahKegiatan(Request $request)
    {
        $validator = $this->validatorPostModalTambahKegiatan($request->all());
        if ($validator->fails()) 
        {
            $this->throwValidationException($request, $validator);
        }

        $name = strip_tags($request->input('name'));
        $date = strip_tags($request->input('date'));
        $info = strip_tags($request->input('info'));

        DB::beginTransaction();
            $kegiatan = new Kegiatan ([
                'name'    		=> $name,
                'date'         	=> $date,
                'info'       	=> $info,
            ]);
            $kegiatan->save();
        DB::commit();

        return 'kegiatan berhasil ditambah';
    }

    public function getModalUbahKegiatan($id)
    {
    	$kegiatan = Kegiatan::find($id);
        return view('modal.admin.kegiatan.ubahKegiatan.formUbahKegiatan')
        			->with('kegiatan', $kegiatan);
    }

    protected function validatorPostModalUbahKegiatan(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'date' => 'required',
            'info' => 'required',
        ]);      
    }

    public function postModalUbahKegiatan(Request $request)
    {
        $validator = $this->validatorPostModalUbahKegiatan($request->all());
        if ($validator->fails()) 
        {
            $this->throwValidationException($request, $validator);
        }

        $name = strip_tags($request->input('name'));
        $date = strip_tags($request->input('date'));
        $info = strip_tags($request->input('info'));

        DB::beginTransaction();
            $kegiatan = Kegiatan::find($request->input('id'));
            $kegiatan->name = $name;
            $kegiatan->date = $date;
            $kegiatan->info = $info;
            $kegiatan->save();
        DB::commit();

        return 'kegiatan berhasil diubah';
    }

    public function getModalHapusKegiatan($id)
    {
        return view('modal.admin.kegiatan.hapusKegiatan.formHapusKegiatan')
        			->with('id', $id);
    }

    public function postModalHapusKegiatan(Request $request)
    {
        DB::beginTransaction();
            $kegiatan = Kegiatan::find($request->input('id'));
            $kegiatan->delete();
        DB::commit();

        return 'kegiatan berhasil dihapus';
    }
}
