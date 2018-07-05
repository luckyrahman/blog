@extends('admin.layout.master')

@section('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Use List</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>About</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
        <tr>
          <td>{{ $user->id}}</td>
          <td>{{ $user->name}}</td>
          <td>{{ $user->email}}</td>
          <td>{{ $user->about}}</td>
          <td>{{ $user->status}}</td>
          <td><a href="{{ route('admin.edit',$user->id ) }}" class="btn btn-success" href="">Edit</a>
          <a class="btn btn-warning" href="">Delete</a>
          </td>
        </tr>
        @endforeach
      </tfoot>
    </table>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
@endsection