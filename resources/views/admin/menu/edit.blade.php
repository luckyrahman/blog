@extends('admin.layout.master')

@section('content')
    <section class="content">
        <div class="row">
            <!-- right column -->
        <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Users</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{ route('update.users')}}" method="POST">
             {{ csrf_field() }}               
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Name</label>

                  <div class="col-sm-10">
                    <input type="hidden" value="{{ $user->id }}" name="name" class="form-control" id="inputEmail3" placeholder="Name">
                    <input type="text" value="{{ $user->name }}" name="name" class="form-control" id="inputEmail3" placeholder="Name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3"  class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                    <input type="email"   value="{{ $user->email}}" name="email" class="form-control" id="inputEmail3" placeholder="Email">
                  </div>
                </div>
     

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">About</label>
                  <div class="col-sm-10">
                    <textarea name="about"  class="form-control" id="inputPassword3" placeholder="Description">{{ $user->about}}</textarea>
                  </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">status</label>
                    <div class="col-sm-10">
                        <select name="status" class="form-control select2 form-control-sm">
                            <option value=" ">Select Status....</option>
                            <option value="1">Enable</option>
                            <option value="2">Disable</option>
                        </select>
                    </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Submit</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
        </div>
    </section>

@endsection

 