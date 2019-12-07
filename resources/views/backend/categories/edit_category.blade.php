@extends ('backend.layout')

@section('content')
@include('backend.menu')
<div id="content" class="span10">

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon plus"></i><span class="break"></span>Edit Category</h2>
            <div class="box-icon">
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
            </div>
        </div>
        <div class="box-content">
            <form class="form-horizontal" action="/dashboard/categories/{{ $find_category->category_id }}" method="post">
                @csrf
                {{method_field('PATCH')}}
              <fieldset>
                <div class="control-group">
                    @include('backend.message')
                </div>


                <div class="control-group">
                  <label class="control-label" for="typeahead">Name </label>
                  <div class="controls">
                    <input type="text" class="span6 typeahead" name="category_name" id="typeahead" placeholder="Enter category name here" value="{{ $find_category->category_name }}">
                  </div>
                </div>

                <div class="control-group hidden-phone">
                  <label class="control-label" for="textarea2">Category Description</label>
                  <div class="controls">
                    <textarea class="cleditor" name="category_description" id="textarea2" rows="3" >{{ $find_category->category_description }}</textarea>
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">Category Image</label>
                  <div class="controls">
                    <input name="category_image" type="file">
                  </div>
							  </div>

                <div class="form-actions">
                  <button type="submit" class="btn btn-primary">Update</button>
                  <button type="click" class="btn btn-dark" href="{{url('/dashboard/categories')}}">Go Back</button>
                </div>
              </fieldset>
            </form>

        </div>
    </div><!--/span-->

</div><!--/row-->
</div>
@include('backend.footer')
@endsection
