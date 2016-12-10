<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use App\Http\Requests;
use App\Keuangan;

class LaporanKeuanganController extends Controller
{
    /**
     * Display page to manage current resource.
     *
     * @return Response
     */
    public function manage()
    {
    	$keuangan = Keuangan::all();
        return view('pages.laporan_keuangan')
        			->with('keuangan', $keuangan);
    }

    public function getModalTambahKeuangan()
    {
        return view('modal.admin.keuangan.tambahKeuangan.formTambahKeuangan');
    }

    protected function validatorPostModalTambahKeuangan(array $data)
    {
        return Validator::make($data, [
            'date' => 'required',
            'info' => 'required',            
            'total' => 'required|numeric',
        ]);      
    }

    public function postModalTambahKeuangan(Request $request)
    {
        $validator = $this->validatorPostModalTambahKeuangan($request->all());
        if ($validator->fails()) 
        {
            $this->throwValidationException($request, $validator);
        }

        $total = strip_tags($request->input('total'));
        $date = strip_tags($request->input('date'));
        $info = strip_tags($request->input('info'));

         echo "<pre>";
        print_r($total .'+'. $date .'+'. $info);
        echo "</pre>";

        DB::beginTransaction();
            $Keuangan = new Keuangan ([
                'date'         	=> $date,
                'info'       	=> $info,                
                'total'    		=> $total,
            ]);
            $Keuangan->save();
        DB::commit();

        return 'keuangan berhasil ditambah';
    }

    public function getModalUbahKeuangan($id)
    {
    	$Keuangan = Keuangan::find($id);
        return view('modal.admin.keuangan.ubahKeuangan.formUbahKeuangan')
        			->with('Keuangan', $Keuangan);
    }

    protected function validatorPostModalUbahKeuangan(array $data)
    {
        return Validator::make($data, [
            'date' => 'required',
            'info' => 'required',            
            'total' => 'required|numeric',
        ]);      
    }

    public function postModalUbahKeuangan(Request $request)
    {
        $validator = $this->validatorPostModalUbahKeuangan($request->all());
        if ($validator->fails()) 
        {
            $this->throwValidationException($request, $validator);
        }

        $total = strip_tags($request->input('total'));
        $date = strip_tags($request->input('date'));
        $info = strip_tags($request->input('info'));

        DB::beginTransaction();
            $Keuangan = Keuangan::find($request->input('id'));
            $Keuangan->total = $total;
            $Keuangan->date = $date;
            $Keuangan->info = $info;
            $Keuangan->save();
        DB::commit();

        return 'keuangan berhasil diubah';
    }

    public function getModalHapusKeuangan($id)
    {
        return view('modal.admin.keuangan.hapusKeuangan.formHapusKeuangan')
        			->with('id', $id);
    }

    public function postModalHapusKeuangan(Request $request)
    {
        DB::beginTransaction();
            $Keuangan = Keuangan::find($request->input('id'));
            $Keuangan->delete();
        DB::commit();

        return 'keuangan berhasil dihapus';
    }
}
