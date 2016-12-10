<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use App\Http\Requests;
use App\Slide;

class SlideGambarController extends Controller
{
    /**
     * Display page to manage current resource.
     *
     * @return Response
     */
    public function manage()
    {
    	$Slide = Slide::all();
        return view('pages.slide')
        			->with('Slide', $Slide);
    }

    public function getModalTambahSlide()
    {
        return view('modal.admin.slide.tambahSlide.formTambahSlide');
    }

    protected function validatorPostModalTambahSlide(array $data)
    {
        return Validator::make($data, [
            'title' => 'required|max:255',
            'info' => 'required',
            'photo' => 'required|image',
        ]);      
    }

    public function postModalTambahSlide(Request $request)
    {
        $validator = $this->validatorPostModalTambahSlide($request->all());
        if ($validator->fails()) 
        {
            $this->throwValidationException($request, $validator);
        }

        $title = strip_tags($request->input('title'));
        $info =  nl2br(strip_tags($request->input('info')));
        $Photo = $request->file('photo')->getClientOriginalName();
        $extension = pathinfo($Photo, PATHINFO_EXTENSION);
        $newPhotoName = uniqid(rand()) .'.'. $extension;
        
        $desired_dir = public_path(). '/assets/img';
        $URL = asset('assets/img/');
        $request->file('photo')->move($desired_dir, $newPhotoName);   

        DB::beginTransaction();
            $Slide = new Slide ([
                'title'    			=> $title,
                'info'         		=> $info,
                'status'       		=> 0,
                'image_path'  		=> $URL,
                'image_name'  		=> $newPhotoName
            ]);
            $Slide->save();
        DB::commit();

        return 'Slide berhasil ditambah';
    }

    public function getModalUbahSlide($id)
    {
    	$Slide = Slide::find($id);
        return view('modal.admin.slide.ubahSlide.formUbahSlide')
        			->with('Slide', $Slide);
    }

    protected function validatorPostModalUbahSlide(array $data)
    {
        return Validator::make($data, [
            'title' => 'required|max:255',
            'info' => 'required',
            'photo' => 'image',
        ]);      
    }

    public function postModalUbahSlide(Request $request)
    {
        $validator = $this->validatorPostModalUbahSlide($request->all());
        if ($validator->fails()) 
        {
            $this->throwValidationException($request, $validator);
        }

        $title = strip_tags($request->input('title'));
        $info =  nl2br(strip_tags($request->input('info')));
        $Slide = Slide::find($request->input('id'));

        if (empty($request->file('photo'))) 
        {   
        	DB::beginTransaction();
	            $Slide->title = $title;
	            $Slide->info = $info;
	            $Slide->save();
	        DB::commit();
	    }
	    else
	    {
	    	DB::beginTransaction();
	            $Photo = $request->file('photo')->getClientOriginalName();
		        $extension = pathinfo($Photo, PATHINFO_EXTENSION);
		        $newPhotoName = uniqid(rand()) .'.'. $extension;
		        $desired_dir = public_path(). '/assets/img';
		        $URL = asset('assets/img/');
		        unlink("$desired_dir/$Slide->image_name");
		        $request->file('photo')->move($desired_dir, $newPhotoName); 
		        $Slide->title = $title;
	            $Slide->info = $info;
	            $Slide->image_path = $URL;
	            $Slide->image_name = $newPhotoName; 
	            $Slide->save();
	        DB::commit();
	    }

        return 'Slide berhasil diubah';
    }

    public function getModalHapusSlide($id)
    {
        return view('modal.admin.slide.hapusSlide.formHapusSlide')
        			->with('id', $id);
    }

    public function postModalHapusSlide(Request $request)
    {
    	$Slide = Slide::find($request->input('id'));
        $desired_dir = public_path(). '/assets/img';
        unlink("$desired_dir/$Slide->image_name");
        DB::beginTransaction();            
            $Slide->delete();
        DB::commit();

        return 'Slide berhasil dihapus';
    }

    public function postTurnOnSlide(Request $request)
    {
        DB::beginTransaction();
            $Slide = Slide::find($request->input('id'));
            $Slide->status = 1;
            $Slide->save();
        DB::commit();

        return 'On';
    }

    public function postTurnOffSlide(Request $request)
    {
        DB::beginTransaction();
            $Slide = Slide::find($request->input('id'));
            $Slide->status = 0;
            $Slide->save();
        DB::commit();

        return 'Off';
    }
}
