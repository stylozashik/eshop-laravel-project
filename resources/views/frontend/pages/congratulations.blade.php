@extends('frontend.layout')

@section('home_content')
<div class="container">
    <div class="alert alert-success" role="alert"><strong>Thanks for your order !</strong> We will contact with you as soon as possible </div>
    <div class="jumbotron">
        <h1>WANTED MORE SHOPPING ?</h1>
        <p>No problem at all, click here to go back on shop</p>
        <p><a class="btn btn-primary btn-lg" href="{{url('/shop')}}" role="button">GO TO SHOP</a></p>
    </div>
</div>
    
@endsection