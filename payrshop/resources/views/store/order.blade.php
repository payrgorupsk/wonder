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
	.right-side
	{
		max-width: 33%;
		width: 100%;
		box-shadow: 0 0 3px silver;
		border-radius: 6px;
	}
	.right-side input
	{
		width: 100%;
		height: 40px;
		font-size: 15px;
		padding: 3px;
		border: none;
		outline: none;
		border-radius: 12px;
		border-bottom: .5px solid #FFA500;
	}
	.right-side form div
	{
		display: flex;
		margin-bottom: 15px;
		align-items: center;
	}
	.right-side form div i
	{
		margin-right: 10px;
		color: #FFA500;
	}
	.voucher-btn
	{
		outline: none;
		border-radius: 6px;
		border: none;
		background: #FFA500;
		padding: 3px;
		transition: .5s;
		font-weight: 500;
		letter-spacing: 1px;
	}
	.voucher-btn:hover,.proceed button:hover
	{
		background: #FF8C00;
		cursor: pointer;
		color: white;
	}
	.proceed button
	{
		padding: 10px;
		outline: none;
		border-radius: 6px;
		border: none;
		width: 100%;
		background: #FFA500;
		transition: .5s;
		font-weight: 500;
		letter-spacing: 1px;
	}
	.vat
	{
		font-size: .8rem;
		color: silver;
		font-weight: 100;
	}
	.price-tag
	{
		color: #DC143C;
	}
	.detailss a
	{
		color: red;
	}
	#subtract,#add
	{
		font-size: .5rem;
		outline: none;
		border: none;
	}
	#quantity
	{
		width: 20%;
	}
	.complete-btn
	{
		border: none;
		outline: none;
		background: #FFA500;
		margin-top: 15px;
		padding: 5px 10px;
		float: right;
		border-radius: 6px;
	}
	.qnt
	{
		float: right;
		font-size: 1.2rem;
	}
	.qnt input
	{
		font-weight: bold;
	}

	.payment-image img
	{
		max-width: 40px;
		width: 100%;
	}

	#rocket,#nagad,#bkash
	{
		display: none;
	}

	.pay_btn:hover
	{
		box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
		background: yellow;
	}

	.pay_btn:focus
	{
		box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
		background: green;
	}

	@media (max-width:991px)
	{
		.bd
		{
			flex-direction: column;
		}
		.right-side
		{
			max-width: 100%;
			margin-top: 10px;
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

<form action="{{route('place_order')}}" method="POST">
	@csrf
<div class="prc-col-md-10 prc-middlecol">

	<div class="bd p-2">
			<div class="left-side">
				<table class="table table-bordered table-striped table-hover">
					<thead>
						<tr>
							<th width="5%">Delete</th>
							<th width="20%">Image</th>
							<th width="25%">Items</th>
							<th width="20%">Price</th>
							<th width="30%">Quantity</th>
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
							<td><button type="button" class="btn btn-warning delete">X</button></td>
							<td><img width = "100%" src="{{asset('images/products/'.$images[0])}}" alt="image"></td>
							<td>
								<h6>{{$product->product_name}}</h6>
							</td>
							<td>
								<p><b>{{$product->currency}} <span class="prc" data-id="{{$product->id}}">{{$dis_price}}</span></b></p>
								<p class="price-tag"><del>{{$product->currency}} {{$og_price}}</del></p>
								<p style="color: green">Dis: {{$product->discount}}</p>
							</td>
							<td>
								<input type="hidden" name="products[]" value="{{$product->id}}">
								<button type="button" class="btn btn-danger subtract" onclick="price_down({{$product->id}})">⯆</button>
								<input style="width: 50%" class="txt text-center quantity" data-id="{{$product->id}}" name="quantity[]" type="number" value="1" onchange="calculate()" readonly>
								<button type="button" class="btn btn-success add" onclick="price_up({{$product->id}})">⯅</button>
							</td>
						</tr>
						@endforeach

					</tbody>


				</table>

			</div>

			<div class="right-side">
				<div class="p-2">
					<div class="mb-4">
						<h4>Shipping & Billing</h4>
					</div>
					<form>
						<div>
							<i class="far fa-user"></i>
							<input type="text" name="name" placeholder="Your Name" required>
						</div>
						<div>
							<i class="fas fa-map-marker-alt"></i>
							<input type="text" name="address" placeholder="Your Address" required>
						</div>
						<div>
							<i class="fas fa-phone"></i>
							<input type="number" name="phone" placeholder="Phone Number" required>
						</div>
						<div>
							<i class="far fa-envelope"></i>
							<input type="email" name="email" placeholder="Email Address" required>
						</div>
					</form>
					<div class="my-4">
						<h4>Order Summery</h4>
					</div>
					<div class="d-flex justify-content-between mb-3">
						<h6>Subtotal ( items )</h6>
						<p><b>{{$product->currency}} <span id="total-net-amount"></span></b></p>
					</div>
					<div class="d-flex justify-content-between mb-3">
						<h6>Shipping Fee</h6>

						<?php

						if($product->currency == 'TK'){
							$shipping_fee = 100;
						}
						else{

							$shipping_fee = (float)100/80;
						}
						?>


						<p><b>{{$product->currency}} <span id="shipping_fee">{{$shipping_fee}}</span></b></p>
					</div>
					<div class="d-flex justify-content-between mb-4">
						<input type="text" name="Code" placeholder="Voucher Code">
						<button type="button" class="ms-2 voucher-btn px-2">APPLY</button>
					</div>
					<div class="d-flex justify-content-between mb-3">
						<h6>Total</h6>
						<p><b>{{$product->currency}} <span id="total-amount"></span></b></p>
					</div>
					<div class="text-end vat">
						<p>VAT included, where applicable</p>
					</div>

					<div>
						<h4>Payment method</h4>
					</div>

					<div class="d-flex justify-content-around align-items-center payment-image py-3 px-3">


						<button type="button" class="btn pay_btn" id="bkash_btn"><img src="{{asset('images/payment_methods/bkash.png')}}"></button>
						<button type="button" class="btn pay_btn" id="rocket_btn"><img src="{{asset('images/payment_methods/rocket.png')}}"></button>
						<button type="button" class="btn pay_btn" id="nagad_btn"><img src="{{asset('images/payment_methods/nagad.png')}}"></button>
						<button type="button" class="btn pay_btn" id="paypal_btn"><img src="{{asset('images/payment_methods/paypal.png')}}"></button>
					</div>

					<div class="py-1" id="pay_info" style="display: none;">

						<input style="text-align: center; font-weight: bold;" type="text" name="payment_method" id="payment_method" readonly>
						<input class="px-3 mb-2 pay_number" type="text" name="pay_number" placeholder="Payment Phone Number" required>
						
						<input class="px-3 mb-2 trx_id" type="text" name="trx_id" placeholder="Transaction ID" required>
					</div>

					<div class="py-1" id="paypal_info" style="display: none;">

						<input type="hidden" id="currency" value="{{$product->currency}}" readonly>

						<input style="text-align: center; font-weight: bold;" name="paypal_amount" id="paypal_amount" readonly>
						
					</div>

					<div class="mt-4 proceed">
						<button type="submit" id="form_submit" disabled>Proceed to pay</button>
					</div>
				</div>
			</div>
		
	</div>

</div>

</form>

@endsection

@push('js')
<script>

	$(document).ready(function(){

		calculate();

		$(".delete").click(function() {
			$(this).closest("tr").remove();

			calculate();
		});

		$('#bkash_btn').click(function(){
			$("#payment_method").val('bkash');
			$("#form_submit").prop('disabled',false);
			$(".pay_number").prop('required',true);
			$(".trx_id").prop('required',true);
			$('#paypal_info').hide();
			$('#pay_info').show();
			
		});
		$('#rocket_btn').click(function(){
			$("#payment_method").val('rocket');
			$("#form_submit").prop('disabled',false);
			$(".pay_number").prop('required',true);
			$(".trx_id").prop('required',true);
			$('#paypal_info').hide();
			$('#pay_info').show();
		});
		$('#nagad_btn').click(function(){
			$("#payment_method").val('nagad');
			$("#form_submit").prop('disabled',false);
			$(".pay_number").prop('required',true);
			$(".trx_id").prop('required',true);
			$('#paypal_info').hide();
			$('#pay_info').show();
		});
		$('#paypal_btn').click(function(){
			$("#payment_method").val('paypal');
			$("#form_submit").prop('disabled',false);
			$(".pay_number").prop('required',false);
			$(".trx_id").prop('required',false);
			$('#pay_info').hide();
			$('#paypal_info').show();
		});
	});



	function calculate()
	{

		var qty = 0 ;
		var prc = 0 ;
		var total_net_amount = 0;
		var total_amount = 0;
		var shipping_fee = parseFloat($('#shipping_fee').html());
		var currency = $('#currency').val();
		var mod_amount = 0;
		var mod_currency = 'USD';

		$('.prc').each(function(){

			var id = $(this).attr("data-id");

			prc = parseInt($(this).text());
			qty = $('input[data-id='+id+']').val();

			total_net_amount += parseFloat(prc*qty);

		});

		total_amount = parseFloat(total_net_amount + shipping_fee);

		if(currency == 'TK'){
			mod_amount = parseFloat(total_amount / 80);
			mod_currency = ' USD';
		}
		else{

			mod_amount = parseFloat(total_amount);
			mod_currency = ' USD';

		}


		$('#total-net-amount').html(total_net_amount);
		$('#total-amount').html(total_amount);
		$('#paypal_amount').val(mod_amount + mod_currency);
		
	}

	function price_up(id)
	{
		var qty = $('input[data-id='+id+']').val();
		qty = parseInt(qty);
		$('input[data-id='+id+']').val(qty + 1);
		calculate();
	}

	function price_down(id)
	{
		var qty = $('input[data-id='+id+']').val();
		qty = parseInt(qty);

		if(qty > 1){
			$('input[data-id='+id+']').val(qty - 1);
		}
		calculate();
	}
</script>

@endpush


