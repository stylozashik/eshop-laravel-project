@extends('backend.layout')

@section('content')
    @include('backend.menu')

    	<!-- start: Content -->
			<div id="content" class="span10">


                    <div class="row-fluid sortable">
                        <div class="box span12">
                            <div class="box-header" data-original-title>
                                <h2><i class="fas fa-bookmark"></i><span class="break"></span>All Messages</h2>
                                <div class="box-icon">

                                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>

                                </div>
                            </div>
                            <div class="box-content">
                                <table class="table table-hover table-bordered bootstrap-datatable datatable">
                                  <thead>
                                      <tr>
                                          <th class="text-warning">Contact ID</th>
                                          <th class="text-warning">Name</th>
                                          <th class="text-warning">Email</th>
                                          <th class="text-warning">Subject</th>
                                          <th class="text-warning">Message</th>
                                          <th class="text-warning">Erase</th>
                                      </tr>
                                  </thead>
                                  <tbody>

                                      @foreach ($contact as $c)
                                      <tr>
                                            <td>{{$c->contact_id}}</td>
                                            <td class="center">{{$c->name}}</td>
                                            <td class="center">{{$c->email}}</td>
                                            <td class="center">{{$c->subject}}</td>
                                            <td class="center">{{$c->message}}</td>
                                            <td class="center">{{$c->contact_date}}</td>
                                            <td class="center">{{$c->contact_time}}</td>  
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
