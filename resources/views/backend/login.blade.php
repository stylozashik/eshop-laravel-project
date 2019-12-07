@extends('backend.layout')

@section('header_content')
    <style type="text/css">
        .brand_logo { padding: 20px;}
        body { background: url("/admin/img/bg-login.jpg") !important; }
    </style>
@endsection



@section('content')

<div class="container-fluid-full">
		<div class="row-fluid">

			<div class="row-fluid">
				<div class="login-box">
					<div class="icons">
						<a href="{{URL::to('/')}}"><i class="halflings-icon home"></i></a>
                    </div>





                    <div>
                        <a class="brand_logo" href="{{URL::to('/')}}"><img src="{{URL::to('/frontend/images/home/logo.png')}}" /></a>
                    </div>


                    <h2>Login to Dashboard</h2>

                        <p class="alert-danger" role="alert">
                            <?php
                            $message = Session::get('message');
                            if($message){
                                echo $message ;
                                Session::put('message',null);
                            }
                            ?>
                        </p>
                <form class="form-horizontal" action="{{url('/admin-dashboard')}}" method="post">

                        @csrf


						<fieldset>

							<div class="input-prepend" title="admin_email">
								<span class="add-on"><i class="halflings-icon user"></i></span>
								<input class="input-large span10" name="admin_email" id="username" type="text" placeholder="type username"/>
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend" title="admin_password">
								<span class="add-on"><i class="halflings-icon lock"></i></span>
								<input class="input-large span10" name="admin_password" id="password" type="password" placeholder="type password"/>
							</div>
							<div class="clearfix"></div>

							<label class="remember" for="remember"><input type="checkbox" id="remember" />Remember me</label>

							<div class="button-login">
                            <button type="submit" class="btn btn-primary">Login</button>
							</div>
							<div class="clearfix"></div>
					</form>
					<hr>

				</div><!--/span-->
			</div><!--/row-->


	</div><!--/.fluid-container-->

		</div><!--/fluid-row-->

@endsection
