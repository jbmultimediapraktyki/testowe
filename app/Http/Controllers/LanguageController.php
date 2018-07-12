<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function lang(Request $request)
    {
        Session::put('locale', $request->get('locale'));
        return redirect()->back();
    }
}
