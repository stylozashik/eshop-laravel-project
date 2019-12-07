@extends ('backend.layout')

@section('content')
@include('backend.menu')
<div id="content" class="span10">

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon plus"></i><span class="break"></span>Add Brand</h2>
            <div class="box-icon">
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
            </div>
        </div>
        <div class="box-content">
            <form class="form-horizontal" action="{{url('/dashboard/brands/add')}}" method="post" enctype="multipart/form-data">
                @csrf
              <fieldset>
                <div class="control-group">
                    @include('backend.message')
                </div>


                <div class="control-group">
                  <label class="control-label" for="typeahead">Name </label>
                  <div class="controls">
                    <input type="text" class="span6 typeahead" name="title" id="typeahead" placeholder="Enter brand name here">
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label" for="typeahead">Subtitle </label>
                  <div class="controls">
                    <input type="text" class="span6 typeahead" name="subtitle" id="typeahead" placeholder="Enter brand subtitle here">
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label" for="typeahead">Origin </label>
                  <div class="controls">
                    <input type="text" class="span6 typeahead" name="origin" id="typeahead" placeholder="Country origin">
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">Brand Image</label>
                  <div class="controls">
                    <input name="brand_image" type="file">
                  </div>
							  </div>

                <div class="control-group">
                  <label class="control-label" for="typeahead">Publication Status </label>
                  <div class="controls">
                    <input type="checkbox" name="brand_status" value="1">
                  </div>
                </div>

                

                <div class="form-actions">
                  <button type="submit" class="btn btn-primary">Save</button>
                  <button type="reset" class="btn">Cancel</button>
                </div>
              </fieldset>
            </form>

        </div>
    </div><!--/span-->

</div><!--/row-->
</div>
@include('backend.footer')
@endsection
