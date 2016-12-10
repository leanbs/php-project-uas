<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use App\Http\Requests;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display page to manage current resource.
     *
     * @return Response
     */
    public function manage()
    {
    	$Category = Category::all();
        return view('pages.category')
        			->with('Category', $Category);
    }

    public function getModalTambahCategory()
    {
        return view('modal.admin.category.tambahCategory.formTambahCategory');
    }

    protected function validatorPostModalTambahCategory(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
        ]);      
    }

    public function postModalTambahCategory(Request $request)
    {
        $validator = $this->validatorPostModalTambahCategory($request->all());
        if ($validator->fails()) 
        {
            $this->throwValidationException($request, $validator);
        }

        $name = strip_tags($request->input('name'));

        DB::beginTransaction();
            $Category = new Category ([
                'name'    		=> $name
            ]);
            $Category->save();
        DB::commit();

        return 'Category berhasil ditambah';
    }

    public function getModalUbahCategory($id)
    {
    	$Category = Category::find($id);
        return view('modal.admin.category.ubahCategory.formUbahCategory')
        			->with('Category', $Category);
    }

    protected function validatorPostModalUbahCategory(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
        ]);      
    }

    public function postModalUbahCategory(Request $request)
    {
        $validator = $this->validatorPostModalUbahCategory($request->all());
        if ($validator->fails()) 
        {
            $this->throwValidationException($request, $validator);
        }

        $name = strip_tags($request->input('name'));

        DB::beginTransaction();
            $Category = Category::find($request->input('id'));
            $Category->name = $name;
            $Category->save();
        DB::commit();

        return 'Category berhasil diubah';
    }

    public function getModalHapusCategory($id)
    {
        return view('modal.admin.category.hapusCategory.formHapusCategory')
        			->with('id', $id);
    }

    public function postModalHapusCategory(Request $request)
    {
        DB::beginTransaction();
            $Category = Category::find($request->input('id'));
            $Category->delete();
        DB::commit();

        return 'Category berhasil dihapus';
    }
}
