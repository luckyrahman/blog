<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Lang;

class LanguageController extends Controller
{
     public function chooseLanguage(Request $request)
    {   
		if($request->ajax()){
			$request->session()->put('locale', $request->locale);
			$request->session()->flash('alert-success', 'app.locale_change_success');
		}
    }

}
