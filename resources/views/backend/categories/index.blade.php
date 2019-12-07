@extends('backend.layout')

@section('content')
    @include('backend.menu')

    	<!-- start: Content -->
			<div id="content" class="span10">


                    <div class="row-fluid sortable">
                        <div class="box span12">
                            <div class="box-header" data-original-title>
                                <h2><i class="fas fa-bookmark"></i><span class="break"></span>All Categories</h2>
                                <div class="box-icon">

                                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>

                                </div>
                            </div>
                            <div class="box-content">
                                <table class="table table-hover table-bordered bootstrap-datatable datatable">
                                  <thead>
                                      <tr>
                                          <th class="text-warning">Name</th>
                                          <th class="text-warning">Description</th>
                                          <th class="text-warning">Image</th>
                                          <th class="text-warning">Publication Date</th>
                                          <th class="text-warning">Status</th>
                                          <th class="text-warning">Edit</th>
                                          <th class="text-warning">Erase</th>
                                      </tr>
                                  </thead>
                                  <tbody>

                                      @foreach ($categories as $c)
                                      <tr>
                                            <td>{{$c->category_name}}</td>
                                            <td class="center">{{$c->category_description}}</td>
                                            <td><img src="{{asset("storage/$c->category_image")}}" alt="" style="height:80px; width:80px"/></td> 
                                            <td class="center">{{$c->created_at}}</td>
                                            
                                            @if($c->category_status == 1)
                                                <td class="center">
                                                    <span class="label label-success">Published</span>
                                                </td>
                                            @else
                                                <td class="center">
                                                    <span class="label label-warning">Unpublish</span>
                                                </td>
                                            @endif

                                            <td class="center">
                                                @if ($c->category_status == 1)
                                                    <a class="btn btn-warning" href="/dashboard/categories/{{ $c->category_id }}/inactive">
                                                    <i class="halflings-icon white thumbs-down"></i>
                                                    </a>
                                                @else
                                                    <a class="btn btn-success" href="/dashboard/categories/{{ $c->category_id }}/active">
                                                    <i class="halflings-icon white thumbs-up"></i>
                                                    </a>
                                                @endif
                                                
                                           
                                                <a class="btn btn-info" href="/dashboard/categories/{{ $c->category_id }}/edit">
                                                    <i class="halflings-icon white edit"></i>
                                                </a>
                                            </td> 

                                            <td class="center">
                                                 <form method="POST" action="/dashboard/categories/{{ $c->category_id }}">
                                                    {{ method_field('DELETE') }}
                                                    @csrf
                                                    <button type="Delete" class="btn btn-danger"> <i class="halflings-icon white trash"></i></button>
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
