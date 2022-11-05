<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class ContactController extends Controller
{
    //
    public function index()
    {
        $data['settings']=Setting::first();
        return view('front.contact')->with($data);
    }
}
