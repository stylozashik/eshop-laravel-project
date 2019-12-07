@extends('frontend.layout')

@section('home_content')

		@if ($cart_total > 0)


			<section id="cart_items">
				<div class="container">
					<div class="breadcrumbs">
						<ol class="breadcrumb">
						<li><a href="{{ URL::to('/') }}">Home</a></li>
						<li class="active">Shopping Cart</li>
						</ol>
					</div>
					<div class="table-responsive cart_info">
						<table class="table table-condensed">
							<thead>
								<tr class="cart_menu">
									<td class="image">Item</td>
									<td class="Title">Title</td>
									<td class="price">Price</td>
									<td class="quantity">Quantity</td>
									<td class="total">Total</td>
									<td></td>
								</tr>
							</thead>
							<tbody>
								<tr>
								@foreach ($cart_details as $cart)
									<td class="cart_product">
										<img src="{{ URL::to("storage/".$cart->options->image) }}" alt="" style="height:100px; weidth:100px;"/>
									</td>
									<td class="cart_description">
										<h4><a href="">{{ $cart->name }}</a></h4>
										<p>Cart ID: {{ $cart->rowId }}</p>
									</td>
									<td class="cart_price">
										<p>৳ {{ $cart->price }}</p>
									</td>
									<td class="cart_quantity">
										<div class="cart_quantity_button">
											<form action="{{URL::to('cart/update')}}" method="post">
											@csrf
												<input class="cart_quantity_input" type="number" step="1" name="qty" value="{{ $cart->qty }}" autocomplete="off" size="2">
												<input type="hidden" name="update" value="{{ $cart->rowId }}">
												<input type="submit" name="submit" value="update" class="btn btn-sm btn-default">
											</form>

											
										</div>
									</td>
									<td class="cart_total">
										<p class="cart_total_price">৳ {{ $cart->price*$cart->qty }}</p>
									</td>
									<td class="cart_delete">
										<a class="cart_quantity_delete" href="{{ URL::to('cart/show/'.$cart->rowId) }}"><i class="fa fa-times"></i></a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</section> <!--/#cart_items-->
			<?php $session_customer_id=Session::get('customer_id'); 
				  $session_shipping = Session::get('s_id');
			?>
			<section id="do_action">
				<div class="container">
					<div class="row">
						<div class="col-sm-6">
							
						</div>
						<div class="col-sm-6">
							<div class="total_area">
								<ul>
									<li>Cart Sub Total : <span>৳ {{ $cart_subtotal }}</span></li>
									<li>Vat & Tax (5%) :<span>৳ {{ $cal_tax }}</span></li>
									<li>Shipping :<span>Free</span></li>
									<strong><li>Total Price <span>৳ {{ $cart_total }}</span></li></strong>
								</ul>
									@if ($session_customer_id != NULL && $session_shipping !=NULL)
										<a class="btn btn-default update" href="{{URL::to('/payment')}}">Check Out</a>
									@elseif ($session_customer_id != NULL && $session_shipping ==NULL)
										<a class="btn btn-default update" href="{{URL::to('/checkout')}}">Check Out</a>
									@else
										<a class="btn btn-default update" href="{{URL::to('/login-check')}}">Check Out</a>
									@endif
									
									
							</div>
						</div>
					</div>
				</div>
			</section><!--/#do_action-->
		
		@else
			<div class="container">
				<div class="jumbotron">
					<h1 class="display-4">Oops..</h1>
					<p class="lead">There is no item in the cart.</p>
					<hr class="my-4">
					<p>Please go to shop and add some item on the cart.</p>
					<a class="btn btn-primary btn-lg" href="/" role="button">Back To Shop</a>
				</div>
			</div>
			

		@endif

    	

@endsection

