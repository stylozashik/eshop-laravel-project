@extends('backend.layout')

@section('content')

    @include('backend.menu')
<!-- start: Content -->

<!--Custom PHP -->
<?PHP
    //$find_cat = DB::table('categories')->get();
    //$count_cat = $find_cat->count();

    //$find_brands = DB::table('brands')->get();
    //$count_brands = $find_brands->count();

    //$find_products = DB::table('products')->get();
    //$count_products = $find_products->count();
    $count_products = 0;
    $count_categories = 0;
    $count_brands = 0;

    $find_orders = DB::table('orders')->get();
    $count_orders = $find_orders->count();

    $find_customers = DB::table('customers')->get();
    $count_customers = $find_customers->count();

    $find_messages = DB::table('messages')->get();
    $count_messages = $find_messages->count();



?>

<!--End Custom PHP -->

<div id="content" class="span10">

    <div class="row-fluid">

        <div class="row-fluid">
            <a href="/dashboard/products" class="quick-button metro green span2">
                <i class="icon-barcode"></i>
                <p>Products</p>
                @foreach ($products as $product)
                    @if ($product->product_status == 1)
                        <?php $count_products++; ?>
                    @endif
                @endforeach
                <span class="badge">{{ $count_products }}</span>
            </a>

            <a class="quick-button metro yellow span2" href="/dashboard/customers">
                <i class="icon-group"></i>
                <p>Customers</p>
                <span class="badge">{{ $count_customers }}</span>
            </a>
            <a class="quick-button metro red span2" href="/dashboard/messages">
                <i class="icon-comments-alt"></i>
                <p>Messages</p>
                <span class="badge">{{ $count_messages }}</span>
            </a> 
            <a class="quick-button metro blue span2" href="/dashboard/orders">
                <i class="icon-shopping-cart"></i>
                <p>Orders</p>
                <span class="badge">{{ $count_orders }}</span>
            </a>

            <a href="/dashboard/brands" class="quick-button metro pink span2">
                <i class="fas fa-tags"></i>
                <p>Brands</p>
                @foreach ($brands as $brand)
                    @if ($brand->brand_status == 1)
                        <?php $count_brands++; ?>
                    @endif
                @endforeach
                <span class="badge">{{ $count_brands }}</span>
            </a>
            <a href="/dashboard/categories" class="quick-button metro black span2">
                <i class="fas fa-bookmark"></i>
                <p>Categories</p>
                @foreach ($categories as $category)
                    @if ($category->category_status == 1)
                        <?php $count_categories++; ?>
                    @endif
                @endforeach
                <span class="badge">{{ $count_categories }}</span>
            </a>

            <div class="clearfix"></div>

        </div>

    </div>

    <br>


    <div class="row-fluid">

        <div class="widget blue span5" onTablet="span6" onDesktop="span5">

            <h2><span class="glyphicons globe"><i></i></span> Order Geography</h2>

            <hr>

            <div class="content">

                <div class="verticalChart">

                    <div class="singleBar">

                        <div class="bar">

                            <div class="value">
                                <span>89%</span>
                            </div>

                        </div>

                        <div class="title">BAN</div>

                    </div>

                    <div class="singleBar">

                        <div class="bar">

                            <div class="value">
                                <span>2%</span>
                            </div>

                        </div>

                        <div class="title">PL</div>

                    </div>

                    <div class="singleBar">

                        <div class="bar">

                            <div class="value">
                                <span>1%</span>
                            </div>

                        </div>

                        <div class="title">GB</div>

                    </div>

                    <div class="singleBar">

                        <div class="bar">

                            <div class="value">
                                <span>0%</span>
                            </div>

                        </div>

                        <div class="title">DE</div>

                    </div>

                    <div class="singleBar">

                        <div class="bar">

                            <div class="value">
                                <span>3%</span>
                            </div>

                        </div>

                        <div class="title">NL</div>

                    </div>

                    <div class="singleBar">

                        <div class="bar">

                            <div class="value">
                                <span>0%</span>
                            </div>

                        </div>

                        <div class="title">CA</div>

                    </div>

                    <div class="singleBar">

                        <div class="bar">

                            <div class="value">
                                <span>2%</span>
                            </div>

                        </div>

                        <div class="title">FI</div>

                    </div>

                    <div class="singleBar">

                        <div class="bar">

                            <div class="value">
                                <span>1%</span>
                            </div>

                        </div>

                        <div class="title">RU</div>

                    </div>

                    <div class="singleBar">

                        <div class="bar">

                            <div class="value">
                                <span>1%</span>
                            </div>

                        </div>

                        <div class="title">AU</div>

                    </div>

                    <div class="singleBar">

                        <div class="bar">

                            <div class="value">
                                <span>0%</span>
                            </div>

                        </div>

                        <div class="title">N/A</div>

                    </div>

                    <div class="clearfix"></div>

                </div>

            </div>

        </div><!--/span-->

        <div class="box black span3" ontablet="span6" ondesktop="span4">
					<div class="box-header">
						<h2><i class="halflings-icon white list"></i><span class="break"></span>Weekly Statement</h2>
						
					</div>
					<div class="box-content">
						<ul class="dashboard-list metro">
							<li>
								<a href="#">
									<i class="icon-arrow-up green"></i>                               
									<strong>92</strong>
									New Comments                                    
								</a>
							</li>
						  <li>
							<a href="#">
							  <i class="icon-arrow-down red"></i>
							  <strong>15</strong>
							  New Registrations
							</a>
						  </li>
						  <li>
							<a href="#">
							  <i class="icon-minus blue"></i>
							  <strong>36</strong>
							  New Articles                                    
							</a>
						  </li>
						  <li>
							<a href="#">
							  <i class="icon-comment yellow"></i>
							  <strong>45</strong>
							  User reviews                                    
							</a>
						  </li>
						  <li>
							<a href="#">
							  <i class="icon-arrow-up green"></i>                               
							  <strong>112</strong>
							  New Comments                                    
							</a>
						  </li>
						  <li>
							<a href="#">
							  <i class="icon-arrow-down red"></i>
							  <strong>31</strong>
							  New Registrations
							</a>
						  </li>
						  <li>
							<a href="#">
							  <i class="icon-minus blue"></i>
							  <strong>93</strong>
							  New Articles                                    
							</a>
                        </div>
            </div>

        <div class="widget yellow span4 noMargin" onTablet="span12" onDesktop="span4">
            <h2><span class="glyphicons fire"><i></i></span> Server Load</h2>
            <hr>
            <div class="content">
                 <div id="serverLoad2" style="height:224px;"></div>
            </div>
        </div>

    </div>

    <div class="row-fluid">

        <div class="span8 widget blue" onTablet="span7" onDesktop="span8">

            <div id="stats-chart2"  style="height:282px" ></div>

        </div>

        <div class="sparkLineStats span4 widget green" onTablet="span5" onDesktop="span4">

            <ul class="unstyled">

                <li><span class="sparkLineStats3"></span>
                    Pageviews:
                    <span class="number">781</span>
                </li>
                <li><span class="sparkLineStats4"></span>
                    Pages / Visit:
                    <span class="number">2,19</span>
                </li>
                <li><span class="sparkLineStats5"></span>
                    Avg. Visit Duration:
                    <span class="number">00:02:58</span>
                </li>
                <li><span class="sparkLineStats6"></span>
                    Bounce Rate: <span class="number">59,83%</span>
                </li>
                <li><span class="sparkLineStats7"></span>
                    % New Visits:
                    <span class="number">70,79%</span>
                </li>
                <li><span class="sparkLineStats8"></span>
                    % Returning Visitor:
                    <span class="number">29,21%</span>
                </li>

            </ul>

            <div class="clearfix"></div>

        </div><!-- End .sparkStats -->

    </div>



    <!-- end: Content -->
</div><!--/#content.span10-->
</div><!--/fluid-row-->


@include('backend.footer')

@endsection
