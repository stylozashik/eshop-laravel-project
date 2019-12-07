@extends('backend.layout')

@section('content')
    @include('backend.menu')

    	<!-- start: Content -->
			<div id="content" class="span10">


                    <div class="row-fluid sortable">
                        <div class="box span12">
                            <div class="box-header" data-original-title>
                                <h2><i class="fas fa-barcode"></i><span class="break"></span>All Orders</h2>
                                <div class="box-icon">

                                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>

                                </div>
                            </div>
                            <div class="box-content">
                                <table class="table table-hover table-bordered bootstrap-datatable datatable">
                                  <thead>
                                      <tr>
                                          <th class="text-warning">Order ID</th>
                                          <th class="text-warning">Customer Name</th>
                                          <th class="text-warning">Phone</th>
                                          <th class="text-warning">Email</th>
                                          <th class="text-warning">Total Bill</th>
                                          <th class="text-warning">Order Status</th>
                                          <th class="text-warning">Order Date</th>
                                          <th class="text-warning">Order Time</th>
                                          <th class="text-warning">Manage</th>
                                      </tr>
                                  </thead>
                                  <tbody>

                                        @foreach($orders_data as $o)
                                            @if ($o->order_status == 'Pending')
                                              <tr>
                                                <td>{{$o->order_id}}</td>
                                                <td class="center">{{$o->customer_name}}</td>
                                                <td class="center">{{$o->phone_number}}</td>
                                                <td class="center">{{$o->customer_email}}</td>
                                                <td class="center"><strong>৳ </strong>{{$o->order_total}}</td>
                                                
                                                @if($o->order_status == "Pending")
                                                    <td class="center">
                                                        <span class="label label-warning">Pending</span>
                                                    </td>
                                                @else
                                                    <td class="center">
                                                        <span class="label label-success">Delivered</span>
                                                    </td>
                                                @endif
                                                <td>{{$o->order_date}}</td>
                                                <td>{{$o->order_time}}</td>
                                                <td class="center">
                                                @if ($o->order_status == "Pending")
                                                    <a class="btn btn-success" href="/dashboard/orders/{{ $o->order_id }}/active">
                                                    <i class="halflings-icon white thumbs-up"></i>
                                                    </a>
                                                @else
                                                    <a class="btn btn-warning" href="/dashboard/orders/{{ $o->order_id }}/inactive">
                                                    <i class="halflings-icon white thumbs-down"></i>
                                                    </a>
                                                @endif
                                                <a class="btn btn-warning" href="/dashboard/orders/{{ $o->order_id }}/details"> 
                                                <i class="halflings-icon eye-open"></i>
                                                </a>
                                            </tr>  
                                            @endif
                                            
                                        @endforeach

                                  </tbody>
                              </table>
                            </div>
                        </div><!--/span-->

                    </div><!--/row-->
        </div>

    @include('backend.footer')
@endsection
