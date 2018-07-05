<?php

namespace App\Http\Controllers\Admin;
use App\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{

    public function create()
    {
        return view('admin.menu.create');
    }

    public function store(Request $request)
    {  



        $postdata =$request->except('_token');

        $data = new Blog;

        $data->title=$postdata['title'];
        $data->description=$postdata['description'];

        $data->save();
        return redirect('admin/menu/create')->with('success', 'Information has been added');
        
    

    }
}
