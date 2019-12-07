@extends('backend.layout')

@section('content')
    @include('backend.menu')

    	<!-- start: Content -->
			<div id="content" class="span10">


                    <div class="row-fluid sortable">
                        <div class="box span12">
                            <div class="box-header" data-original-title>
                                <h2><i class="fas fa-bookmark"></i><span class="break"></span>All Customers</h2>
                                <div class="box-icon">

                                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>

                                </div>
                            </div>
                            <div class="box-content">
                                <table class="table table-hover table-bordered bootstrap-datatable datatable">
                                  <thead>
                                      <tr>
                                          <th class="text-warning">Customer ID</th>
                                          <th class="text-warning">Name</th>
                                          <th class="text-warning">Email</th>
                                          <th class="text-warning">Phone</th>
                                          <th class="text-warning">Erase</th>
                                      </tr>
                                  </thead>
                                  <tbody>

                                      @foreach ($customers as $c)
                                      <tr>
                                            <td>{{$c->customer_id}}</td>
                                            <td class="center">{{$c->customer_name}}</td>
                                            <td class="center">{{$c->customer_email}}</td>
                                            <td class="center">{{$c->phone_number}}</td>
                                            <td class="center">
                                                 <form method="POST" action="/dashboard/customers/{{ $c->customer_id }}">
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
