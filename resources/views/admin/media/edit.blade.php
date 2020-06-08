@extends('admin.layout.master')
 
@section('page-title')
  Edit Media
@endsection
 
@section('main-content')
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <!-- form start -->
      <form name="formEdit" id="formEdit" method="post" action="/admin/media/{{ $media->id }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{method_field('put') }}
      <div class="box box-primary">
        <!-- /.box-header -->
        <div class="box-body">
           @if (count($errors))
            <div class="alert alert-danger">
              <strong>Ooppss! Something went wrong</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif
        	<!-- row start -->
      		<div class="row"> 
                <div class="col-xs-6">
                	
                	<div class="form-group {{ $errors->has('title') ? 'has-error' : null }}">
                		<label for="title">Title <span class="text text-red">*</span></label>
                  		<input type="text" name="title" class="form-control" id="title" placeholder="Title" value="{{ $media->title }}"> @if($errors->has('title')) <span class="text-red">{{ $errors->first('title') }}</span> @endif
                  	</div>

                  	<div class="form-group {{ $errors->has('slug') ? 'has-error' : null }}">
                    <label for="slug">Slug <span class="text text-red">*</span></label>
                      <input type="text" name="slug" class="form-control" id="slug" placeholder="Slug" value="{{ $media->slug }} " readonly>
                       @if($errors->has('slug')) <span class="text-red">{{ $errors->first('slug') }}</span> @endif
                    </div>
                    <div class="form-group {{ $errors->has('media_type') ? 'has-error' : null }}">
                      <label>Media Type <span class="text text-red">*</span></label>
                      <select name="media_type" id="media_type" class="form-control" style="width: 100%;">
                        <option value="0">-- Select Media Type --</option>
                        <option value="slider" {{ ($media->media_type == 'slider') ? 'selected': null }}>Slider</option>
                        <option value="gallery" {{ ($media->media_type == 'gallery') ? 'selected': null }}>Gallery</option>
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
                      <textarea name="description" id="description" class="form-control" rows="5" placeholder="Enter ...">{{ $media->description}}</textarea>
                     </div>
                	</div>
          	</div>

              <!-- row end -->

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Update</button>
            <button type="reset" class="btn btn-danger">Cancel</button>
          </div>
      </div>
      </form>
      <!-- /.box -->

      <!-- form end -->

    </section>
   @endsection