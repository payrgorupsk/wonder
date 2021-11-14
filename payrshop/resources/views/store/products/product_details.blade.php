@extends('layouts.app')
@push('css')
<link rel="stylesheet" href="{{asset('jqzoom/css/jquery.jqZoom.css?'.time())}}">
<link rel="stylesheet" href="{{asset('fontawesome/css/all.css?'.time())}}">
<style>
	.container{
		font-size:initial;
	}
	.preview {
		display: -webkit-box;
		display: -webkit-flex;
		display: -ms-flexbox;
		display: flex;
		-webkit-box-orient: vertical;
		-webkit-box-direction: normal;
		-webkit-flex-direction: column;
		-ms-flex-direction: column;
		flex-direction: column; }
		@media screen and (max-width: 996px) {
			.preview {
				margin-bottom: 20px; } }

				.preview-pic {
					-webkit-box-flex: 1;
					-webkit-flex-grow: 1;
					-ms-flex-positive: 1;
					flex-grow: 1; }

					.preview-thumbnail.nav-tabs {
						border: none;
						margin-top: 15px; }
						.preview-thumbnail.nav-tabs li {
							width: 18%;
							margin-right: 2.5%; }
							.preview-thumbnail.nav-tabs li img {
								max-width: 100%;
								display: block; }
								.preview-thumbnail.nav-tabs li a {
									padding: 0;
									margin: 0; }
									.preview-thumbnail.nav-tabs li:last-of-type {
										margin-right: 0; }

/* .tab-content {
  overflow: hidden; } */
  .tab-content img {
  	width: 100%;
  	-webkit-animation-name: opacity;
  	animation-name: opacity;
  	-webkit-animation-duration: .3s;
  	animation-duration: .3s; }

  	.card {
  		margin-top: 50px;
  		/* background: #eee; */
  		padding: 5px;
  		line-height: 1.5em; }

  		@media screen and (min-width: 997px) {
  			.wrapper {
  				display: -webkit-box;
  				display: -webkit-flex;
  				display: -ms-flexbox;
  				display: flex; } }

  				.details {
  					display: -webkit-box;
  					display: -webkit-flex;
  					display: -ms-flexbox;
  					display: flex;
  					-webkit-box-orient: vertical;
  					-webkit-box-direction: normal;
  					-webkit-flex-direction: column;
  					-ms-flex-direction: column;
  					flex-direction: column; }

  					.colors {
  						-webkit-box-flex: 1;
  						-webkit-flex-grow: 1;
  						-ms-flex-positive: 1;
  						flex-grow: 1; }

  						.product-title, .price, .sizes, .colors {
  							text-transform: UPPERCASE;
  							font-weight: bold; }

  							.checked, .price span {
  								color: #ff9f1a; }

  								.product-title, .rating, .product-description, .price, .vote, .sizes {
  									margin-bottom: 15px; }

  									.product-title {
  										margin-top: 0; }

  										.size {
  											margin-right: 10px; }
  											.size:first-of-type {
  												margin-left: 40px; }

  												.color {
  													display: inline-block;
  													vertical-align: middle;
  													margin-right: 10px;
  													height: 2em;
  													width: 2em;
  													border-radius: 2px; }
  													.color:first-of-type {
  														margin-left: 20px; }

  														.add-to-cart, .like {
  															background: #ff9f1a;
  															padding: 1.2em 1.5em;
  															border: none;
  															text-transform: UPPERCASE;
  															font-weight: bold;
  															color: #fff;
  															-webkit-transition: background .3s ease;
  															transition: background .3s ease; }
  															.add-to-cart:hover, .like:hover {
  																background: #b36800;
  																color: #fff; }

  																.not-available {
  																	text-align: center;
  																	line-height: 2em; }
  																	.not-available:before {
  																		font-family: fontawesome;
  																		content: "\f00d";
  																		color: #fff; }

  																		.orange {
  																			background: #ff9f1a; }

  																			.green {
  																				background: #85ad00; }

  																				.blue {
  																					background: #0076ad; }

  																					.tooltip-inner {
  																						padding: 1.3em; }

  																						@-webkit-keyframes opacity {
  																							0% {
  																								opacity: 0;
  																								-webkit-transform: scale(3);
  																								transform: scale(3); }
  																								100% {
  																									opacity: 1;
  																									-webkit-transform: scale(1);
  																									transform: scale(1); } }

  																									@keyframes opacity {
  																										0% {
  																											opacity: 0;
  																											-webkit-transform: scale(3);
  																											transform: scale(3); }
  																											100% {
  																												opacity: 1;
  																												-webkit-transform: scale(1);
  																												transform: scale(1); } }

  																											</style>

  																											<style>
  																												/* Style the tab */
  																												.tab {
  																													overflow: hidden;
  																													border: 1px solid #ccc;
  																													background-color: #f1f1f1;
  																												}

/* Style the buttons that are used to open the tab content */
.tab button {
	background-color: inherit;
	float: left;
	border: none;
	outline: none;
	cursor: pointer;
	padding: 8px 8px;
	transition: 0.3s;
}

/* Change background color of buttons on hover */
.tab button:hover {
	padding: 8px 8px;
	background-color: #ddd;
	/* border-bottom: 2px solid #00aeff; */
}

/* Create an active/current tablink class */
.tab button.active {
	padding: 8px 8px;
	background-color: #ccc;
	/* border-bottom: 2px solid #0076ad; */
}

/* Style the tab content */
.tabcontent {
	display: none;
	padding: 6px 12px;
	border: 1px solid #ccc;
	border-top: none;
}
.tablinks{
	font-size: 14px;
}
.tabdes{
	margin-left: 5px;
	margin-right:5px;
}
@media (max-width:600px){
	.tablinks{
		font-size: 11px;
	}
	.container{
		padding:0px;
	}
	.tabdes{
		margin-left: 10px;
		margin-right:10px;
	}
}
</style>
@endpush
@section('main')
<div class="prc-col-md-10 prc-middlecol"  >
	<x-shop-search-cart></x-shop-search-cart>
	<div class="container">
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">

					<?php

					$images = json_decode($product->product_image);
					$og_price = (int)$product->price;

					if (strpos($product->discount, 'tk') !== false) {
						$dis_price = $og_price - (int)$product->discount;
					}
					else{
						$dis_price = $og_price - ($og_price * (int)$product->discount / 100);
					}

					$count = 0;
					$thumb_count = 0;
					?>

					<div class="preview col-md-6">
						<div class="preview-pic tab-content">

							@foreach($images as $image)
							<?php if($count == 0) { 
								$active = 'active';
							} else {
								$active = '';
							}
							?>

							<div class="zoom-box tab-pane {{$active}}" id="pic-{{$count}}"><img width="100%" src="{{asset('images/products/'.$image)}}" alt=""></div>

							<?php $count++; ?>
							@endforeach
							
						</div>
						<ul class="preview-thumbnail nav nav-tabs">
							@foreach($images as $image)
							<?php if($thumb_count == 0) { 
								$active = 'active';
							} else {
								$active = '';
							}
							?>
							<li class="{{$active}}"><a data-target="#pic-{{$thumb_count}}" data-toggle="tab"><img width="100%" src="{{asset('images/products/'.$image)}}" alt=""></a></li>

							<?php $thumb_count++; ?>
							@endforeach
						</ul>

					</div>
					<div class="details col-md-6">


						<h3 class="product-title">{{$product->product_name}}</h3>
						<h4 class="price">current price: <span><p><span style="text-decoration: line-through;">{{$og_price." ".$product->currency}}</span> <span>{{$dis_price." ".$product->currency}}</span></p></span></h4>
						<div class="rating">
							<div class="stars">
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
							</div>
							<span class="review-no">0 reviews</span>
						</div>
						<p class="product-description">{{$product->product_description}}</p>

						{{-- <p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p> --}}
						<h5 class="sizes">sizes:
							<span class="size" data-toggle="tooltip" title="small">s</span>
							<span class="size" data-toggle="tooltip" title="medium">m</span>
							<span class="size" data-toggle="tooltip" title="large">l</span>
							<span class="size" data-toggle="tooltip" title="xtra large">xl</span>
						</h5>
						<h5 class="colors">colors:
							<span class="color orange not-available" data-toggle="tooltip" title="Not In store"></span>
							<span class="color green"></span>
							<span class="color blue"></span>
						</h5>
						<div class="action text-center">
							

							<form action="{{route('order')}}" method="POST">

								@csrf

								<input type="hidden" name="products[]" value="{{$product->id}}" >

								<button class="add-to-cart btn btn-default" type="button">add to cart</button>
								
								<button class="add-to-cart btn btn-success" type="submit">Buy Now</button>

								<button class="like btn btn-danger" type="button"><span class="fa fa-heart"></span></button>

							</form>
							
							
						</div>
					</div>
				</div>
				<div class="row">
					<div class="container mt-5 tabdes" >
						<!-- Tab links -->
						<div class="tab">
							<button class="tablinks active" id="btntab_description" onclick="toggletab('description')">Description</button>
							<button class="tablinks" id="btntab_delivery" onclick="toggletab('delivery')">Delivery Options</button>
							<button class="tablinks" id="btntab_return_policy" onclick="toggletab('return_policy')">Return Policy</button>
							<button class="tablinks" id="btntab_reviews" onclick="toggletab('reviews')">Reviews (0)</button>
							<button class="tablinks" id="btntab_comments" onclick="toggletab('comments')">Comments (0)</button>
						</div>

						<!-- Tab content -->
						<div id="description" class="tabcontent" style="display: block;">
							<h3>Description</h3>
							<p>{{$product->product_description}}</p>
						</div>
						<div id="delivery" class="tabcontent">
							<h3>Delivery Options</h3>
							<p>London is the capital city of England.</p>
						</div>

						<div id="return_policy" class="tabcontent">
							<h3>Buy & Return Policy</h3>
							<p>{{$product->buy_return_policy}}</p>
						</div>

						<div id="reviews" class="tabcontent">
							<h3>Reviews</h3>
							<p>Tokyo is the capital of Japan.</p>
						</div>
						<div id="comments" class="tabcontent">
							<h3>Comments</h3>
							<p>Tokyo is the capital of Japan.</p>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
@endsection
@push('js')
<script src="{{asset('jqzoom/js/jquery.jqZoom.js')}}"></script>
<script>
	$(function(){
		$(".zoom-box img").jqZoom({
			selectorWidth: 30,
			selectorHeight: 30,
			viewerWidth: 400,
			viewerHeight: 300
		});

	})
</script>
<script>
	function toggletab(tabid) {
		$('.tablinks').removeClass('active');
		$('#btntab_'+tabid).addClass('active');
		$('.tabcontent').hide();
		$('#'+tabid).show();
	}
</script>
@endpush

