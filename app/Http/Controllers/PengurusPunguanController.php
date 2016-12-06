<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PengurusPunguanController extends Controller
{
    /**
     * Display page to manage current resource.
     *
     * @return Response
     */
    public function manage()
    {
        return view('pages.pengurus_punguan');
    }
}
