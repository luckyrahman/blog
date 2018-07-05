@extends('layouts.app')

@section('content')
<style type="text/css">
	.err{
		color: #f30910 !important;
	}
	.imm{
		height:250px !important;
	}
</style>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				@include('header')
				<h3 class="text-center">All Product <a href=" {{ route('viewCart') }} "><i class="fa fa-cart-plus" aria-hidden="true"></i></a>  @if (Cart::count()>0) {{ Cart::count() }}  @endif</h3>
				<br>
			    @foreach($products as $product)
				<div class="col-md-3 imm">
					<img style="height:170px !important;width: 100% !important" src="{{ asset('uploads/products/') }} {{ '/'.$product->product_image }}" class="img-thumbnail image-responsive" alt="Cinque Terre">
					<p><strong>{{ $product->name }}</strong></p>
					<p><strong>{{ $product->selling_price }} .00</strong></p>
					<form action="{{ route('addToCart') }}" method="POST">
					{{ csrf_field() }}
					<input type="hidden" name="product_id" value="{{ $product->id }}">
					<button type="submit" class="btn btn-xs btn-primary">Add To Cart</button>
					</form>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>
@endsection
<!-- {{ asset('uploads/products/') }} {{ '/'.$product->product_image }} -->