<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Blog;
use App\BlogDetail;
use Carbon\Carbon;
use App;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
      return view('home');
    }

    public function store(Request $request)
    {  

       $this->validate($request, [
        'title' => 'required|string|max:50',
        'description' => 'required',
        'status' => 'required',
        'author' => 'required',
        'tag' => 'required',
        ]);    
      
      $Blogdata = new Blog;
      $Blogdata->title = $request->title;
      $Blogdata->description = $request->description;
      $Blogdata->status = $request->status;
      $Blogdata->save();

      $file = $request->file('upload_file');
      $BlogDetailsData = new BlogDetail;
      $BlogDetailsData->blog_id = $Blogdata->id;
      $BlogDetailsData->author = $request->author;
      $BlogDetailsData->tags = $request->tag;
      $BlogDetailsData->upload_file = $file->getClientOriginalName();
      $BlogDetailsData->save();

      $destinationPath = 'uploads';
      $file->move($destinationPath,$file->getClientOriginalName());


      return redirect('home')->with('success', 'Post Save Successfully !');      

    }

    public function allPost()
    {   
     // $blogs = Blog::with(['blog_detail'])->get();
      $blogs = Blog::with(['blog_detail'])->paginate(2);
      // echo App::getLocale();
      return view('view_post')->with(compact('blogs'));
    }

    public function destroy($id)
    {   
      $Blogdata = Blog::find($id);
      $Blogdata->delete();
      return redirect('allPost')->with('success', 'Post Save Successfully !'); 
    }

    public function edit($id)
    {  
    // $BlogData = Blog::find($id);
      $BlogData = Blog::with(['blog_detail'])->where('id',$id)->first();
    //dd($BlogData->toArray());
      return view('single_post',compact('BlogData'));
    }


    public function update(Request $request, $id)
    {  
      $this->validate($request, [
        'title' => 'required|string|max:50',
        'description' => 'required',
        'status' => 'required',
        ]);     

      $BlogData = Blog::find($id);

      $BlogData->title =$request->title;
      $BlogData->description = $request->description;
      $BlogData->status = $request->status;
      $BlogData->save();

      $file = $request->file('upload_file');

      $BlogDetails = BlogDetail::where('blog_id',$id)->first();
      $BlogDetails->author = $request->author;
      $BlogDetails->tags = $request->tag;

      if($file){
        $destinationPath = 'uploads';
        $file->move($destinationPath,$file->getClientOriginalName());
        $BlogDetails->upload_file = $file->getClientOriginalName();
      }else{
        $BlogDetails->upload_file= $BlogDetails->upload_file;

      }
      
      $BlogDetails->save();

      return redirect()->back()->with('success', 'Post Update Successfully !');

    }

    public function store2(Request $request)
    { 

      dd($request->all());


    }



  }
