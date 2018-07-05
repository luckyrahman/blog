@extends('layouts.app')

@section('content')

<div class="container">
  <h2>Add Product</h2>
  <table class="table table-condensed">
    <thead>
      <tr>
        <th>Product Name</th>
        <th>Code</th>
        <th>Category</th>
        <th>Sub Category</th>
        <th>Product group</th>
        <th>Measure unit</th>
        <th>Buying price</th>
        <th>Selling price</th>
        <th>Description</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <form id="form_add_product" method="POST" action="{{ route('save_product') }}">
    {{ csrf_field() }}
    <tbody>
      <tr class="product_row">
        <td><input name="name[]" value="" type="text" class="form-control" id="name"></td>
        <td><input name="code[]" value="" type="text" class="form-control" id="code"></td>
        <td>
	        <select class="form-control" name="category[]" id="category">
	        	<option value="">Select category</option>
	        	<option value="1">A</option>
	        	<option value="2">B</option>
	        	<option value="3">C</option>
	        	<option value="4">D</option>
	        </select>
        </td>
        <td>
	        <select class="form-control" name="sub_category[]" id="sub_category">
	        	<option value="">Select subcategory</option>
	        	<option value="1">AA</option>
	        	<option value="2">BB</option>
	        	<option value="3">CC</option>
	        	<option value="4">DD</option>
	        </select>
        </td>
         <td>
	        <select class="form-control" name="product_group[]" id="product_group">
	        	<option value="">Select group</option>
	        	<option value="1">E</option>
	        	<option value="2">F</option>
	        	<option value="3">G</option>
	        	<option value="4">H</option>
	        </select>
        </td>
        <td>
	        <select class="form-control" name="measure_unit[]" id="measure_unit">
	        	<option value="">Select measure unit</option>
	        	<option value="1">X</option>
	        	<option value="2">Y</option>
	        	<option value="3">Z</option>
	        	<option value="4">W</option>
	        </select>
        </td> 
        <td><input name="buying_price[]" value="" type="text" class="form-control" id="buying_price"></td>
        <td><input name="selling_price[]" value="" type="text" class="form-control" id="selling_price"></td>
        <td><textarea name="description[]" value="" class="form-control" ></textarea></td>
        <td>
	        <select class="form-control" name="status[]">
	        	<option value="">Select status</option>
	        	<option value="1">Active</option>
	        	<option value="2">Inactive</option>
	        </select>
        </td> 
        <td>
	        <button type="button" class="btn btn-sm btn-primary add_more"><b>+</b></button>
	        <button type="button" class="btn btn-sm btn-danger row_remove"><b>-</b></button>
        </td>
       
      </tr>
	</tbody>

		<tfoot>
			<tr>
				<td colspan="11">
				<button type="submit" class="btn btn-primary">Save</button>
				</td>
			</tr>
		</tfoot>
     </form>
  </table>
</div>

<script>
$(function(){
$('table').delegate('.add_more', 'click', function() {

		 var tr = $(this).closest('tr').clone();
		 tr.find('input, select, textarea').val('');
		 tr.appendTo("tbody");
	});
});
	
</script>

@endsection


