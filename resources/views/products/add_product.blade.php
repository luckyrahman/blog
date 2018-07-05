@extends('layouts.app')

@section('content')

<div class="container">
  <h2>Add Product</h2>
 <form class="form-inline" action="{{ route('save_product') }}" method="post">
  <div class="hello">
  <div class="form-group">
    <label for="email">name:</label>
    <input type="text" name="name[]" class="form-control" id="email">
    {{ csrf_field() }}  
  </div> 

   <div class="form-group">
    <label for="email">des:</label>
    <input type="text" name="des[]" class="form-control" id="email">
  </div>
  
  <div>
    <label><button type="button" value="" class="add_more">add</button></label>
  </div>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
</div>

<script>

// $('form').delegate('.add_more', 'click', function() {
// alert('ggggg');
// 		 // var tr = $(this).closest('tr').clone();
// 		 // tr.find('input, select, textarea').val('');
// 		 // tr.appendTo("tbody");

// 		// var tr = $(this).closest('div').clone();
// 		 // tr.appendTo("tbody");
// 	});

$('form').delegate('.add_more', 'click', function() {
    alert("The paragraph was clicked.");
    var div = $(this).closest('div.hello').clone();

    div.appendTo(".hello");
});

	
</script>

@endsection


