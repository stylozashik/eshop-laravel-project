<div class="left-sidebar">
    <h2>Category</h2>
    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
        @foreach ($category as $item)
            @if ($item->category_status == 1)
                <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="/category/{{$item->category_id}}/products">{{$item->category_name}} <img src="{{asset("storage/$item->category_image")}}" alt="" style="float: right; height:20px; width:20px"/></a></h4>
                    
                </div>
                </div>
            @endif
            
        @endforeach


    </div><!--/category-products-->


    
    <div class="brands_products"><!--brands_products-->
        <h2>Brands</h2>
        <div class="brands-name">
            <ul class="nav nav-pills nav-stacked">
                @foreach ($brands as $brand)
                        @if($brand->brand_status == 1)
                                <li><a href="/brand/{{ $brand->brand_id }}/products"> <span class="pull-right"></span>{{ $brand->title }}</a></li>                                        
                        @endif
                @endforeach
            </ul>
        </div>
    </div><!--/brands_products-->

    <div class="price-range"><!--price-range-->
        <h2>Price Range</h2>
        <div class="well text-center">
                <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[50,5000]" id="sl2" ><br />
                <b class="pull-left">৳ 10</b> <b class="pull-right">৳ 10000</b>
        </div>
    </div><!--/price-range-->

    <div class="shipping text-center"><!--shipping-->
        <img src="{{URL::to('/frontend/images/home/shipping.jpg')}}" alt="" />
    </div><!--/shipping-->

</div>