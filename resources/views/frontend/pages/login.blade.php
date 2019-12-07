@extends('frontend.layout')

@section('home_content')
    <section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="{{url('/customer-login')}}" method="post">
							@csrf
							<input type="email" name="customer_email" placeholder="Email Address" required=""/>
                            <input type="password" name="password" placeholder="Password"required=""/>
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Register as a customer</h2>
						<form action="{{url('/customer-registration')}}" method="post">
                            @csrf
							<input required="" type="text" name="customer_name" placeholder="Full name"/>
							<input required="" type="email" name="customer_email" placeholder="Email Address"/>
							<input required="" type="password" name="password" placeholder="Password"/>
                            <input required="" type="text" name="phone_number" placeholder="Phone Number"/>
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->

@endsection
