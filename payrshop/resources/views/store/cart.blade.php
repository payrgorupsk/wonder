@extends('layouts.app')
@push('css')

<style type="text/css">
	table,
	thead,
	tr,
	tbody,
	th,
	td {
		text-align: center;
	}

	.table td {
		text-align: center;
	}

	.bd
	{
		display: flex;
	}
	.left-side
	{
		flex-grow: 1;
		margin-right: 5px;
	}

	.detailss
	{
		box-shadow: 0 0 5px silver;
		border-radius: 7px;
	}
	.headings
	{
		border-radius: 7px;
		box-shadow: 0 0 10px silver;
		width: 100%;
	}
	.price
	{
		margin-left: -100px;
	}
	.left-side img
	{
		max-width: 100px;
		margin-right: 10px;
		border-radius: 6px;
	}
	

	@media (max-width:991px)
	{
		.bd
		{
			flex-direction: column;
		}

		.left-side img
		{
			max-width: 70px;
		}
		.left-side
		{
			margin-right: 0;
		}
		.price
		{
			margin-left: -130px;
		}
	}
</style>

@endpush

@section('main')

<?php

$req_url = 'https://api.exchangerate-api.com/v4/latest/USD';
$response_json = file_get_contents($req_url);

if(false !== $response_json) {
	try {
    // Decoding
		$response_object = json_decode($response_json);
    // YOUR APPLICATION CODE HERE, e.g.
    $base_price = 1; // Your price in USD
    $BDT = round(($base_price * $response_object->rates->BDT), 2);
}
catch(Exception $e) {
        // Handle JSON parse error...
}
}

?>

<form action="{{route('order')}}" method="POST">
	@csrf
	<div class="prc-col-md-10 prc-middlecol">

		<div class="bd p-2">
			<div class="left-side">
				<table class="table table-bordered table-striped table-hover">
					<thead>
						<tr>
							<th width="20%">Image</th>
							<th width="25%">Items</th>
							<th width="20%">Price</th>
							<th width="5%">Delete</th>
							
						</tr>
					</thead>
					<tbody>

						@foreach($products as $product)

						<?php

						$images = json_decode($product->product_image);

						$og_price = (int)$product->price;

						if (strpos($product->discount, 'tk') !== false) {
							$dis_price = $og_price - (int)$product->discount;
						}
						else{
							$dis_price = $og_price - ($og_price * (int)$product->discount / 100);
						}

						?>
						<tr>
							
							<td><img width = "100%" src="{{asset('images/products/'.$images[0])}}" alt="image"></td>
							<td>
								<h6>{{$product->product_name}}</h6>
							</td>
							<td>
								<p><b>{{$product->currency}} <span class="prc" data-id="{{$product->id}}">{{$dis_price}}</span></b></p>
								<p class="price-tag"><del>{{$product->currency}} {{$og_price}}</del></p>
								<p style="color: green">Dis: {{$product->discount}}</p>
							</td>

							<td><button type="button" class="btn btn-warning delete">Delete</button></td>

							<input type="hidden" name="products[]" value="{{$product->id}}">
							
						</tr>
						@endforeach
					</tbody>
				</table>
				<button style="font-size: 17px" type="submit" class="btn btn-success pull-right">Order Now</button>
			</div>
		</div>
	</div>

</form>

@endsection

@push('js')
<script>

	$(document).ready(function(){
		$(".delete").click(function() {
			$(this).closest("tr").remove();
		});
	});

</script>

@endpush


