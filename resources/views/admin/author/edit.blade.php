@extends('admin.layout.master')
 
@section('page-title')
  Edit Author
@endsection
 
@section('main-content')
<section class="content">
 
      <!-- SELECT2 EXAMPLE -->
      <!-- form start -->
      <form name="formEdit" id="formEdit" method="post" action="/admin/author/{{ $author->id }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}
      <div class="box box-primary">
        <!-- /.box-header -->
        <div class="box-body">
          <!-- row start -->
          <div class="row"> 
                <div class="col-xs-6">
                  <div class="form-group {{ $errors->has('title') ? 'has-error' : null }}">
                    <label for="title">Title <span class="text text-red">*</span></label>
                      <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="{{ $author->title }}">
                      @if($errors->has('title')) <span class="text-red">{{ $errors->first('title') }}</span> @endif
                    </div>
 
                    <div class="form-group {{ $errors->has('slug') ? 'has-error' : null }}">
                    <label for="slug">Slug <span class="text text-red">*</span></label>
                      <input type="text" name="slug" class="form-control" id="slug" placeholder="Slug" value="{{ $author->slug }}" readonly>
                      @if($errors->has('slug')) <span class="text-red">{{ $errors->first('slug') }}</span> @endif
                    </div>
                    <div class="form-group {{ $errors->has('designation') ? 'has-error' : null }}">
                      <label for="designation">Designation <span class="text text-red">*</span></label>
                      <input type="text" name="designation" class="form-control" id="designation" placeholder="Designation" value="{{ $author->designation }}">
                      @if($errors->has('designation')) <span class="text-red">{{ $errors->first('designation') }}</span> @endif
                    </div>
                    <div class="form-group {{ $errors->has('dob') ? 'has-error' : null }}">
                  <label for="dob">Date of birth: <span class="text text-red">*</span></label> 
                  <input type="date" name="dob" class="form-control" id="dob" placeholder="Date of Birth" value="{{ $author->dob }}">
                  @if($errors->has('dob')) <span class="text-red">{{ $errors->first('dob') }}</span> @endif
                 </div>
 
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : null }}">
                      <label for="email">Email <span class="text text-red">*</span></label>
                      <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ $author->email }}">
                      @if($errors->has('email')) <span class="text-red">{{ $errors->first('email') }}</span> @endif
                    </div>
                    <div class="form-group {{ $errors->has('country') ? 'has-error' : null }}">
                      <label>Country <span class="text text-red">*</span></label>
                      <select name="country" id="country" class="form-control select2" style="width: 100%;">
                        <option value="none">-- Select Country --</option>
                        @foreach($countries as $country)
                          <option value="{{ $country->name }}" {{ ($country->name == $author->country) ? 'selected' : null }}>{{ $country->name }}</option>
                        @endforeach
                      </select>
                    </div>
 
                    <div class="form-group">
                      <label for="phone">Phone</label>
                      <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone" value="{{ $author->phone }}">
                    </div>
 
                    <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" id="description" class="form-control" rows="5" placeholder="Enter ..."> {{ $author->description }}</textarea>
                  </div>
                </div>
                  
                <div class="col-xs-6">
                   <div class="form-group">
                      <label for="author_img">Author Image <span class="text text-red">*</span></label>
                      <input type="file" name="author_img" class="form-control" id="author_img">
                    </div>
                  <div class="form-group">
                      <label for="facebook_id">Facebook ID</label>
                      <input type="text" name="facebook_id" class="form-control" id="facebook_id" placeholder="Facebook ID" value="{{ $author->facebook_id }}">
                    </div>
 
                    <div class="form-group">
                      <label for="twitter_id">Twitter ID</label>
                      <input type="text" name="twitter_id" class="form-control" id="twitter_id" placeholder="Twitter ID" value="{{ $author->twitter_id }}">
                    </div>
 
                    <div class="form-group">
                      <label for="youtube_id">YouTube ID</label>
                      <input type="text" name="youtube_id" class="form-control" id="youtube_id" placeholder="YouTube ID" value="{{ $author->youtube_id }}">
                    </div>
                    <div class="form-group">
                      <label for="pinterest_id">Pinterest ID</label>
                      <input type="text" name="pinterest_id" class="form-control" id="pinterest_id" placeholder="Pinterest ID" value="{{ $author->pinterest_id }}">
                    </div>
                    <div class="form-group">
                    <label>Author Feature</label>
                    <select name="author_feature" id="author_feature" class="form-control select2" style="width: 100%;">
                      <option value="no"{{ ($author->author_feature == 'no') ? 'selected' : null }}>NO</option>
                      <option value="yes"{{ ($author->author_feature == 'yes') ? 'selected' : null }}>Yes</option>
                    </select>
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