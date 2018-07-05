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
        <!-- --------Language Change----------------- -->
        <select class="" id="languageSwitcher">
            <option value="0">SELECT </option>
            <option value="en">English </option>
            <option value="de">Bangla </option>

        </select>
        {{ csrf_field() }}
        <!-- ---------------------------------------- -->
            <div class="panel panel-default">

                 @include('header')
                <h3 class="text-center">{{ trans('app.all_post') }} </h3>
                
               
                    

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#SID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>File</th>
                            <th>Author</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th width="10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($blogs as $blog)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $blog->title }}</td>
                            <td>{{ $blog->description }}</td>
                            <td><img height="50px" width="50px" src="{{ asset('uploads/') }}{{ '/'.$blog->blog_detail->upload_file }}" /></td>
                            <td>@if(!empty($blog->blog_detail)) {{ $blog->blog_detail->author }} @endif</td>
                            <td>{{ $blog->created_at->format('D, d-m-Y') }}</td>
                            <td>{{ $blog->status }}</td>
                            <td>
                                <a href="{{ route('home.edit',$blog->id) }}" type="button" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></i></a>
                                <a href="{{ route('home.destroy',$blog->id) }}" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>

                </table>
                <div class="text-center">
                    {{ $blogs->render() }}
                </div>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript">

    $(document).ready(function(){
        $('#languageSwitcher').change(function(){
            var locale =$(this).val();
            var _token =$("input[name = _token]").val();
            // alert(locale);
            // alert(_token);
            $.ajax({
                url : '{{ route("language-chooser")}}',
                type: "POST",
                data : {locale:locale , _token : _token },
                dataType :'JSON',
                success :function(data){
                    alert('success');
                },
                complete: function(){
                    window.location.reload(true);
                }
            });

        })
    })
</script>
@endsection
