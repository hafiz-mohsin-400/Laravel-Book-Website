@extends('admin.layout.master')
  
@section('page-title')
  Create Book
@endsection

@section('main-content')
    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <!-- form start -->
      <form name="formAdd" id="formAdd" method="post" action="/admin/book" enctype="multipart/form-data">
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
                    <div class="form-group {{ $errors->has('category_id') ? 'has-error' : null }}">
                      <label>Category <span class="text text-red">*</span></label>
                      <select class="form-control" name="category_id" id="category_id" style="width: 100%;">
                        <option value="none">-- Select Category --</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group {{ $errors->has('author_id') ? 'has-error' : null }}">
                      <label>Author <span class="text text-red">*</span></label>
                      <select class="form-control" name="author_id" id="author_id" style="width: 100%;">
                        <option value="none">-- Select Author --</option>
                        @foreach($authors as $author)
                        <option value="{{ $author->id }}">{{ $author->title}}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group {{ $errors->has('availability') ? 'has-error' : null }}">
                      <label for="availability">Availability <span class="text text-red">*</span></label>
                      <input type="text" class="form-control" name="availability" id="availability" placeholder="Availability">
                      <span class="text-danger">{{ $errors->first('availability') }}</span>
                    </div>
                    <div class="form-group {{ $errors->has('price') ? 'has-error' : null }}">
                  <label for="price">Price: <span class="text text-red">*</span></label> 
                  <input type="text" class="form-control" name="price" id="price" placeholder="Price">
                  <span class="text-danger">{{ $errors->first('price') }}</span>
                 </div>

                    <div class="form-group">
                      <label for="publisher">Publisher</label>
                      <input type="text" class="form-control" name="publisher" id="publisher" placeholder="Publisher">
                    </div>
                    <div class="form-group {{ $errors->has('country_of_publisher') ? 'has-error' : null }}">
                    <label>Country of Publisher <span class="text text-red">*</span></label>
                    <select class="form-control select2" name="country_of_publisher" id="country_of_publisher" style="width: 100%;">
                      <option value="none"> -- Select Country -- </option>
                      @foreach($countries as $country)
                      <option value="{{ $country->name }}">{{ $country->name }}</option>
                      @endforeach
                    </select>
                </div>

                    <div class="form-group">
                      <label for="isbn">ISBN</label>
                      <input type="text" class="form-control" name="isbn" id="isbn" placeholder="ISBN">
                    </div>

                    <div class="form-group">
                      <label for="isbn-10">ISBN-10</label>
                      <input type="text" class="form-control" name="isbn-10" id="isbn-10" placeholder="ISBN-10">
                    </div>
                </div>
                 
                <div class="col-xs-6">
                    <div class="form-group">
                      <label for="book_img">Book Image</label>
                      <input type="file" class="form-control" name="book_img" id="book_img" >
                    </div>
                    <div class="form-group">
                      <label for="book_upload">Book Upload</label>
                      <input type="file" class="form-control" name="book_upload" id="book_upload" >
                    </div>
                  <div class="form-group">
                      <label for="audience">Audience</label>
                      <input type="text" class="form-control" name="audience" id="audience" placeholder="Audience">
                    </div>

                    <div class="form-group">
                      <label for="format">Format</label>
                      <input type="text" class="form-control" name="format" id="format" placeholder="Format">
                    </div>

                    <div class="form-group">
                      <label for="language">Language</label>
                      <input type="text" class="form-control" name="language" id="language" placeholder="Language">
                    </div>
                    <div class="form-group">
                      <label for="total_pages">Total Pages</label>
                      <input type="text" class="form-control" name="total_pages" id="total_pages" placeholder="Total Pages">
                    </div>
                    <div class="form-group">
                      <label for="edition_number">Edition Number</label>
                      <input type="text" class="form-control" name="edition_number" id="edition_number" placeholder="Edition Number">
                    </div>

                    <div class="form-group">
                      <label>Recomended</label>
                      <select class="form-control" name="recomended" id="recomended" style="width: 100%;">
                        <option value="none">-- Select Recomended --</option>
                        <option value="yes">Recomended</option>
                        <option value="no">Not Recomended</option>
                      </select>
                    </div>

                    <div class="form-group {{ $errors->has('description') ? 'has-error' : null }}">
                      <label for="description">Description <span class="text text-red">*</span></label>
                      <textarea class="form-control" name="description" rows="5" id="description" placeholder="Description"></textarea>
                      <span class="text-danger">{{ $errors->first('description') }}</span>
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