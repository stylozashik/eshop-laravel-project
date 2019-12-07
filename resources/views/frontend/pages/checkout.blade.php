@extends('frontend.layout')

@section('home_content')

<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->
			<div class="alert alert-warning" role="alert">Please fill up these details and help us to process your order</div>

			<?php $c_id = Session::get('customer_id') ?>

			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-9 clearfix">
						<div class="bill-to">
							<p>Bill To</p>
							<div class="form-one">
								<form action="{{url('/complete-order')}}" method="post">
									@csrf
									<input type="hidden" name="customer_id" value="{{$c_id}}">
									<input type="text" name="s_first_name" placeholder="First Name *">
									<input type="text" name="s_last_name" placeholder="Last Name *">
									<input type="text" name="s_address_1" placeholder="Address 1 *">
									<input type="text" name="s_address_2" placeholder="Address 2">
                                    <input type="text" name="s_phone" placeholder="Phone Number">
                                    <input type="email" name="s_email" placeholder="Email*">
									
                                    <button type="submit" class="btn btn-primary btn-lg">Place Order</button>
								</form>
							</div>
						</div>
					</div>
                    <div class="col-sm-3 clearfix">
						<div class="bill-to">
							<p>Do you know?</p>
                            <a href="{{url('/')}}"><img src="{{URL::to('/frontend/images/home/shipping.jpg')}}" alt="" /></a>
							
						</div>
					</div>
                    					
				</div>
			</div> <br><br>
		</div>
	</section> <!--/#cart_items-->

@endsection