@extends('layouts.app')

@section('content')
<style type="text/css">
    .err{
        color: #f30910 !important;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                 @include('header')
                <div class="panel-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                </div>

                <form method="POST" class="form-horizontal" action="{{ route('home.update',$BlogData->id) }}" enctype="multipart/form-data">
                    <h3 style="text-align: center;">Post</h3>
                    @if (session('success'))
                    <div class="alert alert-success">
                        <p>{{session('success') }}</p>
                    </div><br />
                    @endif

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="title">Title:</label>
                        <div class="col-sm-10">
                            <input value="{{  $BlogData->title  }}" type="text" class="form-control" id="title" placeholder="Enter Title" name="title">
                            {{ csrf_field() }}  

                            @if ($errors->has('title'))
                            <span class="help-block err">
                                <strong class="err">{{ $errors->first('title') }}</strong>
                            </span>
                            @endif 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="description">Description:</label>
                        <div class="col-sm-10">          
                            <textarea type="text" class="form-control" id="description" placeholder="Enter Description" name="description">{{ $BlogData->description }}</textarea>
                            
                            @if ($errors->has('description'))
                            <span class="help-block err">
                                <strong class="err">{{ $errors->first('description') }}</strong>
                            </span>
                            @endif

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="status">Status:</label>
                        <div class="col-sm-10">          
                            <input type="number" class="form-control" id="status" value="{{ $BlogData->status }}" placeholder="Enter Status" name="status">
                            @if ($errors->has('status'))
                            <span class="help-block err">
                                <strong class="err">{{ $errors->first('status') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group @if($errors->has('description')) has-error @endif">
                        <label class="control-label col-sm-2" for="author">Author:</label>
                        <div class="col-sm-10">          
                            <input type="text" value="{{ $BlogData->blog_detail->author }}" class="form-control" id="author" placeholder="Enter author" name="author">
                            @if ($errors->has('author'))
                            <span class="help-block err">
                                <strong class="err">{{ $errors->first('author') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group @if($errors->has('description')) has-error @endif">
                        <label class="control-label col-sm-2" for="tag">Tags:</label>
                        <div class="col-sm-10">          
                            <input  value="{{ $BlogData->blog_detail->tags }}"  type="text" value="{{ $BlogData->tag }}" class="form-control" id="tag" placeholder="Enter author" name="tag">
                            @if ($errors->has('tag'))
                            <span class="help-block err">
                                <strong class="err">{{ $errors->first('tag') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    

                    <div class="form-group @if($errors->has('description')) has-error @endif">
                        <label class="control-label col-sm-2" for="status">File Upload:</label>
                        <div class="col-sm-10">          
                            <input type="file" value="{{ $BlogData->blog_detail->upload_file }}" class="form-control" id="status" name="upload_file">
                            @if ($errors->has('upload_file'))
                            <span class="help-block err">
                                <strong class="err">{{ $errors->first('upload_file') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="form-group">        
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
