@extends('frontend.layout')

@section('home_content')

<section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    @include('frontend.left_sidebar')
                </div>

                <div class="col-sm-9 padding-right">

    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Products</h2>
        
            @foreach ($products_cat as $product)
                <div class="col-sm-4">
                        <div class="product-image-wrapper">
                        <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{asset("storage/$product->product_image")}}" alt="" />
                                    <h2>৳ {{ $product->price }}</h2>
                                    <p>{{ $product->product_title }}</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2>৳ {{ $product->price }}</h2>
                                        <p>{{ $product->product_title }}</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                </div>
                        </div>
                        <div class="choose">
                            <ul class="nav nav-pills nav-justified">
                            <li><a href="#"><strong>Brand: </strong>{{ $product->title }}</a></li>
                                <li><a href="#"><i class="fa fa-plus-square"></i>View Product</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
       
    </div><!--features_items-->

    </div>
    </div>
    </div>
    </section>

@endsection
