@extends('frontend.layout')

@section('home_content')
@include ('frontend.slider');

    <section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					@include('frontend.left_sidebar')
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Latest Products</h2>
            
                            @foreach ($products->take(8) as $product)
                                @if ($product->product_status == 1)
                                    <div class="col-sm-3">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                    <div class="productinfo text-center">
                                                        <img src="{{asset("storage/$product->product_image")}}" alt="" />
                                                        <h2>৳ {{ $product->price }}</h2>
                                                        <p>{{ $product->product_title }}</p>
                                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                    </div>
                                                    <div class="product-overlay">
                                                        <a href="product/{{ $product->product_id }}/details">
                                                        <div class="overlay-content">
                                                            <h2>৳ {{ $product->price }}</h2>
                                                            <p>{{ $product->product_title }}</p>
                                                            <a href="product/{{ $product->product_id }}/details" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                        </div>
                                                    </div> 
                                                    </a>
                                            </div>
                                            <div class="choose">
                                                <ul class="nav nav-pills nav-justified">
                                                    <li><a href="brand/{{ $product->product_brand_id }}/products"><i class="fa fa-plus-square"></i>{{ $product->title }}</a></li>
                                                    <li><a href="product/{{ $product->product_id }}/details"><i class="fa fa-eye"></i>View</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                
                            @endforeach
				</div><!--features_items-->
				<?php $i=0; $m=0; ?>	
					<div class="category-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
                                @foreach ($category as $c)
                                    <li><a href="#{{$c->category_id}}" data-toggle="tab">{{ $c->category_name}}</a></li>
                                @endforeach
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="{{ $cat_tab->first()->category_id }}" >

                                @foreach ($products as $p)
                                    @if ($cat_tab->first()->category_id == $p->product_category_id)
                                        <div class="col-sm-4">
                                            <div class="product-image-wrapper">
                                                <div class="single-products">
                                                    <div class="productinfo text-center">
                                                        <img src="/storage/{{ $p->product_image }}" alt="" />
                                                        <h2>৳ {{ $p->price }}</h2>
                                                        <p>{{ $p->product_title }}</p>
                                                        <a href="/product/{{$p->product_id}}/details" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php $i++; ?>
                                    @endif
                                    @if ($i == 3)
                                        @break
                                    @endif
                                @endforeach

							</div>
							
                            @foreach ($category as $c)
                                <div class="tab-pane fade" id="{{ $c->category_id }}" >
                            
                                    @foreach ($products->take(5) as $p)
                                        @if ($p->product_category_id == $c->category_id)
                                            <div class="col-sm-4">
                                                <div class="product-image-wrapper">
                                                    <div class="single-products">
                                                        <div class="productinfo text-center">
                                                            <img src="/storage/{{ $p->product_image }}" alt="" />
                                                            <h2>৳ {{ $p->price }}</h2>
                                                            <p>{{ $p->product_title }}</p>
                                                            <a href="/product/{{$p->product_id}}/details" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                    @endforeach

							    </div>
							@endforeach

						</div>
					</div><!--/category-tab-->
					
				</div>
			</div>
		</div>
	</section>

@endsection