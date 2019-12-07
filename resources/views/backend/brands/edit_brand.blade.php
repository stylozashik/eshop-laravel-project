@extends ('backend.layout')

@section('content')
@include('backend.menu')
<div id="content" class="span10">

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon plus"></i><span class="break"></span>Edit Brand</h2>
            <div class="box-icon">
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
            </div>
        </div>
        <div class="box-content">
            <form class="form-horizontal" action="/dashboard/brands/{{ $find_brand->brand_id }}" method="post">
                @csrf
                {{method_field('PATCH')}}
              <fieldset>
                <div class="control-group">
                    @include('backend.message')
                </div>


                <div class="control-group">
                  <label class="control-label" for="typeahead">Title </label>
                  <div class="controls">
                    <input type="text" class="span6 typeahead" name="title" id="typeahead" placeholder="Enter category name here" value="{{ $find_brand->title }}">
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label" for="typeahead">Subtitle </label>
                  <div class="controls">
                    <input type="text" class="span6 typeahead" name="subtitle" id="typeahead" value="{{ $find_brand->subtitle }}">
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label" for="typeahead">Origin </label>
                  <div class="controls">
                    <input type="text" class="span6 typeahead" name="origin" id="typeahead" value="{{ $find_brand->origin }}">
                  </div>
                </div>

                <div class="form-actions">
                  <button type="submit" class="btn btn-primary">Update</button>
                  <button type="click" class="btn btn-warning" href="{{url('/dashboard/brands')}}">Go Back</button>
                </div>
              </fieldset>
            </form>

        </div>
    </div><!--/span-->

</div><!--/row-->
</div>
@include('backend.footer')
@endsection
