@extends('admin.layout.master')
 
@section('page-title')
  Edit Book
@endsection
 
@section('main-content')
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <!-- form start -->
      <form name="formEdit" id="formEdit" method="post" action="/admin/book/{{ $book->id }}" enctype="multipart/form-data">
      {{ csrf_field() }}
      {{ method_field('put') }}
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
                  		<input type="text" name="title" class="form-control" id="title" placeholder="Title" value="{{ $book->title }}">
                      @if($errors->has('title')) <span class="text-red">{{ $errors->first('title') }}</span> @endif
                  	</div>

                  	<div class="form-group {{ $errors->has('slug') ? 'has-error' : null }}">
                		<label for="slug">Slug <span class="text text-red">*</span></label>
                  		<input type="text" name="slug" class="form-control" id="slug" placeholder="Slug" value="{{ $book->slug }}" readonly>
                      @if($errors->has('slug')) <span class="text-red">{{ $errors->first('slug') }}</span> @endif
                  	</div>
                    <div class="form-group {{ $errors->has('category_id') ? 'has-error' : null }}">
                      <label>Category <span class="text text-red">*</span></label>
                      <select class="form-control" name="category_id" id="category_id" style="width: 100%;">
                        <option value="none">-- Select Category --</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ ($category->id == $book->category_id) ? 'selected' : null }}>{{ $category->title }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group {{ $errors->has('author_id') ? 'has-error' : null }}">
                      <label>Author <span class="text text-red">*</span></label>
                      <select class="form-control" name="author_id" id="author_id" style="width: 100%;">
                        <option value="none">-- Select Author --</option>
                        @foreach($authors as $author)
                        <option value="{{ $author->id }}" {{ ($author->id == $book->author_id) ? 'selected' : null }}>{{ $author->title}}</option>
                        @endforeach
                      </select>
                    </div>

                  	<div class="form-group {{ $errors->has('availability') ? 'has-error' : null }}">
                  		<label for="availability">Availability <span class="text text-red">*</span></label>
                  		<input type="text" name="availability" class="form-control" id="availability" placeholder="Availability" value="{{ $book->availability }}">
                      @if($errors->has('availability')) <span class="text-red">{{ $errors->first('availability') }}</span> @endif
                  	</div>
                  	<div class="form-group {{ $errors->has('price') ? 'has-error' : null }}">
			            <label for="price">Price: <span class="text text-red">*</span></label> 
			            <input type="text" name="price" class="form-control" id="price" placeholder="Price" value="{{ $book->price }}">
                  @if($errors->has('price')) <span class="text-red">{{ $errors->first('price') }}</span> @endif
		             </div>

                  	<div class="form-group">
                  		<label for="publisher">Publisher</label>
                  		<input type="text" name="publisher" class="form-control" id="publisher" placeholder="Publisher"  value="{{ $book->publisher }}">
                  	</div>
                    <div class="form-group {{ $errors->has('country_of_publisher') ? 'has-error' : null }}">
                    <label>Country of Publisher <span class="text text-red">*</span></label>
                    <select class="form-control select2" name="country_of_publisher" id="country_of_publisher" style="width: 100%;">
                      <option value="none"> -- Select Country -- </option>
                      @foreach($countries as $country)
                      <option value="{{ $country->name }}" {{ ($country->name == $book->country_of_publisher) ? 'selected' : null }}>{{ $country->name }}</option>
                      @endforeach
                    </select>
                </div>

                   	<div class="form-group">
                  		<label for="isbn">ISBN</label>
                  		<input type="text" name="isbn" class="form-control" id="isbn" placeholder="ISBN"   value="{{ $book->isbn }}">
                  	</div>

                    <div class="form-group">
                      <label for="isbn-10">ISBN-10</label>
                      <input type="text" name="isbn-10" class="form-control" id="isbn-10" placeholder="ISBN-10"  value="{{ $book->isbn-10 }}">
                    </div>
                </div>
                 
                <div class="col-xs-6">
					          <div class="form-group">
                  		<label for="book_img">Book Image</label>
                      <input type="file" class="form-control" name="book_img" id="book_img" >
                  	</div>
                    <div class="form-group">
                      <label for="book_upload">Book Upload</label>
                      <input type="file" class="form-control" name="book_upload" id="book_upload">
                    </div>
                	<div class="form-group">
                  		<label for="audience">Audience</label>
                  		<input type="text" name="audience" class="form-control" id="audience" placeholder="Audience"  value="{{ $book->audience }}">
                  	</div>

                  	<div class="form-group">
                  		<label for="format">Format</label>
                  		<input type="text" name="format" class="form-control" id="format" placeholder="Format"  value="{{ $book->format }}">
                  	</div>

                  	<div class="form-group">
                  		<label for="language">Language</label>
                  		<input type="text" name="language" class="form-control" id="language" placeholder="Language"  value="{{ $book->language }}">
                  	</div>
                    <div class="form-group">
                      <label for="total_pages">Total Pages</label>
                      <input type="text" name="total_pages" class="form-control" id="total_pages" placeholder="Total Pages"  value="{{ $book->total_pages }}">
                    </div>
                    <div class="form-group">
                      <label for="edition_number">Edition Number</label>
                      <input type="text" name="edition_number" class="form-control" id="edition_number" placeholder="Edition Number"  value="{{ $book->edition_number }}">
                    </div>


                    <div class="form-group">
                    <label>Recommended</label>
                    <select name="recomended" id="recomended" class="form-control select2" style="width: 100%;">
                      <option value="yes" {{ ($book->recomended == 'yes') ? 'selected' : null }}>Recomended</option>
                      <option value="no" {{ ($book->recomended == 'no') ? 'selected' : null }}>Not Recomended</option>
                    </select>
                </div>

                  	<div class="form-group {{ $errors->has('description') ? 'has-error' : null }}">
                  		<label for="description">Description <span class="text text-red">*</span></label>
                  		<textarea class="form-control" name="description" rows="5" id="description" placeholder="Description">{{ $book->description }}</textarea>
                      @if($errors->has('description')) <span class="text-red">{{ $errors->first('description') }}</span> @endif
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
      <!-- /.box -->

      <!-- form end -->

    </section>
    @endsection