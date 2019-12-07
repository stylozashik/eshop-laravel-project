@extends('backend.layout')

@section('content')
    @include('backend.menu')

    	<!-- start: Content -->
			<div id="content" class="span10">


                    <div class="row-fluid sortable">
                        <div class="box span12">
                            <div class="box-header" data-original-title>
                                <h2><i class="fas fa-barcode"></i><span class="break"></span>Order View ID : {{ $order_id }}</h2>
                                <div class="box-icon">

                                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>

                                </div>
                            </div>
                            <div class="box-content">
                                <table class="table table-hover table-bordered bootstrap-datatable datatable">
                                  <thead>
                                      <tr>
                                          <th class="text-warning">Product Titile</th>
                                          <th class="text-warning">Image</th>
                                          <th class="text-warning">Quantity</th>
                                          <th class="text-warning">Price</th>
                                          <th class="text-warning">Stock Capacity</th>
                                          <th class="text-warning">Order Date</th>
                                          <th class="text-warning">Order Time</th>
                                      </tr>
                                  </thead>
                                  <tbody>

                                      @foreach ($order_details as $od)
                                      <tr>
                                            <td>{{$od->product_title}}</td>
                                            <td><img src="{{asset("storage/$od->product_image")}}" alt="" style="height:80px; width:80px"/></td>
                                            <td class="center">{{$od->product_quantity}}</td>
                                            <td class="center">{{$od->product_price}}</td>
                                            
                                            @if($od->product_status == 1)
                                                <td class="center">
                                                    <span class="label label-success">In Stock</span>
                                                </td>
                                            @else
                                                <td class="center">
                                                    <span class="label label-warning">Out Of Stock</span>
                                                </td>
                                            @endif

                                            <td class="center">{{$od->order_date}}</td>
                                            <td class="center">{{$od->order_time}}</td>
                                        </tr>
                                      @endforeach


                                  </tbody>
                              </table>
                            </div>
                        </div><!--/span-->

                    </div><!--/row-->
                </div>


    @include('backend.footer')
@endsection
