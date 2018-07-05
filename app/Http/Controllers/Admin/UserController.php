<?php

namespace App\Http\Controllers\Admin;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function create()
    {
        return view('admin.menu.create');
    }

    public function store(Request $request)
    {  

        $userdata =$request->except('_token');
        $data = new User;
        $data->name=$request->name;
        $data->email=$request->email;
        $data->password=$request->password;
        $data->save();
        return redirect('admin/user/create')->with('success', 'Information has been added');
        
    }

    public function index()
    {
        $users= User::all();
        return view('admin.menu.index',compact('users'));
    }


    public function edit($id)
    {  
       $user= User::find($id);
       return view('admin.menu.edit',compact('user'));
      
    }

    public function update(Request $request,$id)
    {  
        return $id;
        $userdata =$request->except('_token');
        $data = new User;
        $user= User::find($id);

        $data->name=$user->name;
        $data->email=$user->email;
        $data->about=$user->about;
        $data->status=$user->status;

        $data->save();
        //return redirect('admin/user/index')->with('success', 'Information has been added');
        
    }
}
