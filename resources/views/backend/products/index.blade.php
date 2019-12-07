@extends('backend.layout')

@section('content')
    @include('backend.menu')

    	<!-- start: Content -->
			<div id="content" class="span10">


                    <div class="row-fluid sortable">
                        <div class="box span12">
                            <div class="box-header" data-original-title>
                                <h2><i class="fas fa-barcode"></i><span class="break"></span>All Products</h2>
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
                                          <th class="text-warning">Category</th>
                                          <th class="text-warning">Brand</th>
                                          <th class="text-warning">Publication Status</th>
                                          <th class="text-warning">Edit Product</th>
                                          <th class="text-warning">Erase</th>
                                      </tr>
                                  </thead>
                                  <tbody>

                                      @foreach ($products as $p)
                                      <tr>
                                            <td>{{$p->product_title}}</td>
                                            <td><img src="{{asset("storage/$p->product_image")}}" alt="" style="height:80px; width:80px"/></td>
                                            <td class="center">{{$p->category_name}}</td>
                                            <td class="center">{{$p->title}}</td>
                                            
                                            @if($p->product_status == 1)
                                                <td class="center">
                                                    <span class="label label-success">Published</span>
                                                </td>
                                            @else
                                                <td class="center">
                                                    <span class="label label-warning">Unpublish</span>
                                                </td>
                                            @endif

                                            <td class="center">
                                                @if ($p->product_status == 1)
                                                    <a class="btn btn-warning" href="/dashboard/products/{{ $p->product_id }}/inactive">
                                                    <i class="halflings-icon white thumbs-down"></i>
                                                    </a>
                                                @else
                                                    <a class="btn btn-success" href="/dashboard/products/{{ $p->product_id }}/active">
                                                    <i class="halflings-icon white thumbs-up"></i>
                                                    </a>
                                                @endif
                                                
                                           
                                                <a class="btn btn-info" href="/dashboard/products/{{ $p->product_id }}/edit">
                                                    <i class="halflings-icon white edit"></i>
                                                </a>
                                            </td> 

                                            <td class="center">
                                                 <form method="POST" action="/dashboard/products/{{ $p->product_id }}">
                                                    {{ method_field('DELETE') }}
                                                    @csrf
                                                    <button type="Delete" class="btn btn-danger"><i class="halflings-icon white trash"></i></button>
                                            </form>
                                            </td>
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
