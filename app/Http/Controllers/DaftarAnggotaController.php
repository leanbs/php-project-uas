<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use App\Http\Requests;
use App\User;

class DaftarAnggotaController extends Controller
{
    /**
     * Display page to manage current resource.
     *
     * @return Response
     */
    public function manage()
    {
    	$user = User::all();

        return view('pages.daftar_anggota')
        		->with('user', $user);
    }

    public function getModalTambahAnggota()
    {
        return view('modal.admin.anggota.tambahAnggota.formTambahAnggota');
    }

    protected function validatorPostModalTambahAnggota(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
            'address' => 'required|min:10',
            'call_number' => 'required|numeric',
        ]);      
    }

    public function postModalTambahAnggota(Request $request)
    {
        $validator = $this->validatorPostModalTambahAnggota($request->all());
        if ($validator->fails()) 
        {
            $this->throwValidationException($request, $validator);
        }

        $name = strip_tags($request->input('name'));
        $email = strip_tags($request->input('email'));
        $password = bcrypt($request->input('password'));
        $address = strip_tags($request->input('address'));
        $call_number = strip_tags($request->input('call_number'));
        $role = strip_tags($request->input('role'));

        DB::beginTransaction();
            $user = new User ([
                'name'    			=> $name,
                'email'         	=> $email,
                'password'       	=> $password,
                'address'  			=> $address,
                'no_telp'  			=> $call_number,
                'role'				=> $role
            ]);
            $user->save();
        DB::commit();

        return 'anggota berhasil ditambah';
    }

    public function getModalUbahAnggota($id)
    {
    	$user = User::find($id);
        return view('modal.admin.anggota.ubahAnggota.formUbahAnggota')
        			->with('user', $user);
    }

    protected function validatorPostModalUbahAnggota(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'address' => 'required|min:10',
            'call_number' => 'required|numeric',
        ]);      
    }

    public function postModalUbahAnggota(Request $request)
    {
        $validator = $this->validatorPostModalUbahAnggota($request->all());
        if ($validator->fails()) 
        {
            $this->throwValidationException($request, $validator);
        }

        $name = strip_tags($request->input('name'));
        $address = strip_tags($request->input('address'));
        $call_number = strip_tags($request->input('call_number'));
        $role = strip_tags($request->input('role'));

        DB::beginTransaction();
            $user = User::find($request->input('id'));
            $user->name = $name;
            $user->address = $address;
            $user->no_telp = $call_number;
            $user->role = $role;
            $user->save();
        DB::commit();

        return 'anggota berhasil diubah';
    }

    public function getModalHapusAnggota($id)
    {
        return view('modal.admin.anggota.hapusAnggota.formHapusAnggota')
        			->with('id', $id);
    }

    public function postModalHapusAnggota(Request $request)
    {
        DB::beginTransaction();
            $user = User::find($request->input('id'));
            $user->delete();
        DB::commit();

        return 'anggota berhasil dihapus';
    }
}
