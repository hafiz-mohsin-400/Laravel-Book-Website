@extends('admin.layout.master')
 
@section('page-title')
  Create Media
@endsection
 
@section('main-content')
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <!-- form start -->
      <form name="formAdd" id="formAdd" method="post" action="/admin/media" enctype="multipart/form-data">
        {{ csrf_field() }}
      <div class="box box-primary">
        <!-- /.box-header -->
        <div class="box-body">
        	<!-- row start -->
      		<div class="row"> 
                <div class="col-xs-6">
                	
                	<div class="form-group {{ $errors->has('title') ? 'has-error' : null }}">
                    <label for="title">Title <span class="text text-red">*</span></label>
                      <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                      <span class="text-danger">{{ $errors->first('title') }}</span>
                    </div>
 
                    <div class="form-group {{ $errors->has('slug') ? 'has-error' : null }}">
                    <label for="slug">Slug <span class="text text-red">*</span></label>
                      <input type="text" name="slug" class="form-control" id="slug" placeholder="Slug" readonly>
                      <span class="text-danger">{{ $errors->first('slug') }}</span>
                    </div>
                    <div class="form-group {{ $errors->has('media_type') ? 'has-error' : null }}">
                      <label>Media Type <span class="text text-red">*</span></label>
                      <select name="media_type" id="media_type" class="form-control" style="width: 100%;">
                        <option value="none">-- Select Media Type --</option>
                        <option value="slider">Slider</option>
                        <option value="gallery">Gallery</option>
                      </select>
                    </div>
                  </div>
                 
                <div class="col-xs-6">
					         <div class="form-group">
                  		<label for="media_img">Media Image <span class="text text-red">*</span></label>
                  		<input type="file" name="media_img" class="form-control" id="media_img">
                  	</div>
                    <div class="form-group">
                      <label>Description</label>
                      <textarea name="description" id="description" class="form-control" rows="5" placeholder="Enter ..."></textarea>
                     </div>
                	</div>
          	</div>

              <!-- row end -->

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-danger">Cancel</button>
          </div>
      </div>
      </form>
      <!-- /.box -->

      <!-- form end -->

    </section>
    @endsection
