@extends('layouts.app')

@section('content')
<div class="container">
  <h2>View Cart</h2>
  @if (Cart::count()>0)     
  <table class="table table-bordered cartcc">
    <thead>
      <tr>
        <th>Product</th>
        <th>Product Image</th>
        <th>Description</th>
        <th>category</th>
        <th>Qty</th>
        <th>Price</th>
        <th>Subtotal</th>
        <th>Delete</th>
      </tr>
    </thead>

    <tbody>

      @foreach(Cart::content() as $row)
      <tr>
        <td>
          <p><strong>{{ $row->name }}</strong></p>
          <p></p>
        </td>
        <td><img height="50px" width="50px" src="{{ asset('uploads/products//'.$row->options->product_image) }}" class="img-thumbnail image-responsive icon" alt="Cinque Terre"></td>
        <td>{{  $row->options->description }}</td>
        <td>{{  $row->options->category }}</td>
        <td>

          <input col="5" name="qty" class="qty" type="number" value="{{ $row->qty }}">
          <input type="hidden" class="rowId" name="rowId" value="{{ $row->rowId }}">
          <button  type="button" class="btn btn-primary btn-sm quantityButton">Update</button>

        </td>

        <td>{{  $row->price }}</td>
        <td>{{  $row->total }}</td>
        <td><a href="{{ route('destroy',$row->rowId) }}">delete</a></td>
      </tr>

      @endforeach

    </tbody>
    <tfoot>
    </tfoot>
  </table>
  @else
  <p>Cart Empty..</p>
  @endif   
</div>



<script type="text/javascript">
  $(document).ready(function() {
    $('.quantityButton').click(function() {
      var qty =$(this).closest('tr').find('.qty').val();
      var rowId =$(this).closest('tr').find('.rowId').val();

        $.ajax({

           url: '{{ route('updateCartProduct') }}',
           type:"POST",

           data : { '_token':'{{ csrf_token() }}', 'qty' : qty , 'rowId' : rowId},
           success : function(response) {
           
            //$(".cartcc").load();
            //$('.cartcc').load('table');
          }
      }); 
    });
  });  

</script>
@endsection