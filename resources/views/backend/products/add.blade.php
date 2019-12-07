@extends ('backend.layout')

@section('content')
@include('backend.menu')

<div id="content" class="span10">

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon plus"></i><span class="break"></span>Add Product</h2>
            <div class="box-icon">
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
            </div>
        </div>
        <div class="box-content">
            <form class="form-horizontal" action="{{url('/dashboard/products/add')}}" method="post" enctype="multipart/form-data">
                @csrf
              <fieldset>
                <div class="control-group">
                    @include('backend.message')
                </div>


                <div class="control-group">
                  <label class="control-label" for="typeahead">Title </label>
                  <div class="controls">
                    <input type="text" class="span6 typeahead" name="product_title" id="typeahead" placeholder="Enter Product Title Here">
                  </div>
                </div>

                 <div class="control-group">
                  <label class="control-label" for="typeahead">Subtitle </label>
                  <div class="controls">
                    <input type="text" class="span6 typeahead" name="product_subtitle" id="typeahead" placeholder="Enter Product Subtitle Here">
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label" for="typeahead">Category </label>
                  <div class="controls">
                    <select class="span6 typeahead" name="product_category_id" id="selectError3">
                      @foreach ($find_category as $category)
                          <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                      @endforeach
                    </select>
								  </div>
                </div>

                <div class="control-group">
                  <label class="control-label" for="typeahead">Brand </label>
                  <div class="controls">
                    <select name="product_brand_id" class="span6 typeahead" id="selectError3">
                      @foreach ($find_brand as $brand)
                          <option value="{{ $brand->brand_id }}">{{ $brand->title }}</option>
                      @endforeach
                    </select>
								  </div>
                </div>   

                <div class="control-group hidden-phone">
                  <label class="control-label" for="textarea2">Product Description</label>
                  <div class="controls">
                    <textarea class="cleditor" name="long_description" id="textarea2" rows="3" ></textarea>
                  </div>
                </div>

                 <div class="control-group hidden-phone">
                  <label class="control-label" for="textarea2">Short Description</label>
                  <div class="controls">
                    <textarea class="cleditor" name="short_description" id="textarea2" rows="3" ></textarea>
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label" for="typeahead">Quantity </label>
                  <div class="controls">
                    <input type="number" step="1" class="span2 typeahead" name="product_quantity" id="typeahead" placeholder="20">
                  </div>
                </div>

                 <div class="control-group">
                  <label class="control-label" for="typeahead">Price </label>
                  <div class="controls">
                    <input type="number" step="0.01" class="span2 typeahead" name="price" id="typeahead" placeholder="100.00">
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label" for="typeahead">Publish</label>
                  <div class="controls">
                    <input type="checkbox" name="product_status" value="1">
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">Product Image</label>
                  <div class="controls">
                    <input name="product_image" type="file">
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
