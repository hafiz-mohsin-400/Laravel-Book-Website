@extends('admin.layout.master')
 
@section('page-title')
  Manage Category
@endsection
 
@section('main-content')
    <section class="content">
     <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"> 
                    <a id="activeAllStatus" url="{{ route('category.active') }}" class="btn btn-danger btn-xm"><i class="fa fa-eye"></i></a>
                    <a id="deactiveAllStatus" url="{{ route('category.deactive') }}" class="btn btn-danger btn-xm"><i class="fa fa-eye-slash"></i></a>
                    <a id="deleteAll" url="{{ route('category.delete') }}" class="btn btn-danger btn-xm"><i class="fa fa-trash"></i></a>
                    <a href="/admin/category/create" class="btn btn-default btn-xm" data-toggle="tooltip" title="Create"><i class="fa fa-plus"></i></a>
              </h3>
              <div class="box-tools">
                <form action="" method="get">
                <div class="input-group input-group-sm" style="width: 250px;">
                  <input type="text" name="s" class="form-control pull-right" placeholder="Search">
                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
                </form>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              @if($categories)
              <table class="table table-bordered">
                <thead style="background-color: #F8F8F8;">
                  <tr>
                    <th width="4%"><input type="checkbox" name="" id="checkAll"></th>
                    <th width="70%">Title</th>
                    <th width="10%">Status</th>
                    <th width="10%">Manage</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($categories as $category)
                <tr>
                  <td><input type="checkbox" name="statusAll[]" value="{{ $category->id }}" class="checkSingle"></td>
                  <td>{{ $category->title }}</td>
                   <td>
                    <form method="post" action="/admin/category/{{$category->id}}/status">
                      <!-- <input type="hidden" name="url" id="url" value="/admin/category/{{$category->id}}/status"> -->
                      {{ csrf_field() }}
                      {{ method_field('put') }}
                        @if($category->status == 'DEACTIVE')
                            <button class="singleStatus btn btn-danger btn-sm"><i class="fa fa-thumbs-down"></i></button>
                        @else
                            <button class="singleStatus btn btn-info btn-sm"><i class="fa fa-thumbs-up"></i></button>
                        @endif
                        </form>
                    </td>
                    <td>
                        <form method="post" action="/admin/category/{{ $category->id }}">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                            <a href="/admin/category/{{ $category->id }}/edit" class="btn btn-info btn-flat btn-sm"> <i class="fa fa-edit"></i></a>
                            <button type="submit" class="singleDelete btn btn-danger btn-flat btn-sm"> <i class="fa fa-trash-o"></i></button>
                        </form>
                    </td>
                </tr>
              @endforeach
            </tbody>
            </table>
            </div>
            <!-- /.box-body -->
              <div class="box-footer clearfix">
                        <div class="row">
                            <div class="col-sm-6">
                                <span style="display:block;font-size:15px;line-height:34px;margin:20px 0;">
                                    Showing {{($categories->currentpage()-1)*$categories->perpage()+1}} to {{$categories->currentpage()*$categories->perpage()}} of {{$categories->total()}} entries
                                   </span>
                            </div>
                          <div class="col-sm-6 text-right">
                            {{ $categories->links() }}
                              <!--ul class="pagination">  
                  <li class="paginate_button previous"><a href="#" >Previous</a></li>
                  <li class="paginate_button active"><a href="#" >1</a></li>
                  <li class="paginate_button "><a href="#">2</a></li>
                  <li class="paginate_button "><a href="#" >3</a></li>
                  <li class="paginate_button "><a href="#">4</a></li>
                  <li class="paginate_button "><a href="#">5</a></li>
                  <li class="paginate_button "><a href="#">6</a></li>
                  <li class="paginate_button next"><a href="#" >Next</a></li>
                </ul> -->
                          </div>
                        </div>
                    </div>
                  @else
                    <div class="alert alert-danger">
                   No record found!
                  </div>
                 @endif
          </div>
            <!-- /.box-body -->
          </div>
          </section>
          @endsection

@section('scripts')
	<script>
	  	$(document).ready(function($) {
	  		$.ajaxSetup({
			    headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			});

			$(".singleStatus").on('click', function(e) {
				e.preventDefault();
        var self = $(this);
        // var url = $("#url").val();
				var url = self.closest('form').attr('action');
				$.ajax({
					url: url,
          type: 'PUT',
				})
				.done(function(data) {
					self.html('');
					if (data == 'ACTIVE') 
					{
						self.closest('form').find('button').removeClass('btn-danger');
						self.closest('form').find('button').addClass('btn-info');
						self.html('<i class="fa fa-thumbs-up"></i>');
					}
					else
					{
						self.closest('form').find('button').removeClass('btn-info');
						self.closest('form').find('button').addClass('btn-danger');
						self.html('<i class="fa fa-thumbs-down"></i>');
					}
				})
				.fail(function() {
					alert("Oppss! Something Went Wrong");
				})
			});

			$(".singleDelete").on('click',function(e) {
				e.preventDefault();
				var self = $(this);
				var url = self.closest('form').attr('action');
				if (confirm('Are you sure you want to delete this?')) 
				{
					$.ajax({
						url: url,
						type: 'delete',
					})
					.done(function(data) {
						if (data == 'true') 
						{
							self.closest('tr').css('background-color', 'skyblue').fadeOut('slow');
							self.remove();
						}
					})
					.fail(function() {
						alert("Oppss! Something Went Wrong");
					})	
				}
				else
				{
					return false;
				}
			});

      // ACTIVE ALL STATUS
      $("#activeAllStatus").on('click', function(e) {
          e.preventDefault();
          $('tbody').addClass('table-loader');
          var statusAllValue = [];

          $("input[name='statusAll[]']:checked").each(function(){
            statusAllValue.push($(this).val());
          });
          $.ajax({
            url: $('#activeAllStatus').attr('url'),
            type: 'GET',
            data: {statusAll : statusAllValue},
          })
          .done(function(data) {
            $.each(data, function(index, val) {
              $("input[value='"+val.id+"']")
              .closest('tr')
              .find('.singleStatus')
              .removeClass('btn-danger')
              .addClass('btn-info')
              .html('<i class="fa fa-thumbs-up"></i>');
            });
          })
          .always(function() {
            $('tbody').removeClass('table-loader');
          });
        });

      // DEACTIVE ALL STATUS
      $("#deactiveAllStatus").on('click', function(e) {
          e.preventDefault();
          var statusAllValue = [];
          $('tbody').addClass('table-loader');

          $("input[name='statusAll[]']:checked").each(function(){
            statusAllValue.push($(this).val());
          });
          $.ajax({
            url: $('#deactiveAllStatus').attr('url'),
            type: 'GET',
            data: {statusAll : statusAllValue},
          })
          .done(function(data) {
            $.each(data, function(index, val) {
            
              $("input[value='"+val.id+"']")
              .closest('tr')
              .find('.singleStatus')
              .removeClass('btn-info')
              .addClass('btn-danger')
              .html('<i class="fa fa-thumbs-down"></i>');
            });
          })
          .always(function() {
            $('tbody').removeClass('table-loader');
          });
        });

      // DELETE ALL
      $("#deleteAll").on('click', function(e) {
          e.preventDefault();
          var statusAllValue = [];
          $('tbody').addClass('table-loader');

          $("input[name='statusAll[]']:checked").each(function(){
            statusAllValue.push($(this).val());
          });
          $.ajax({
            url: $('#deleteAll').attr('url'),
            type: 'GET',
            data: {statusAll : statusAllValue},
          })
          .done(function(data) {
              location.reload(true);
          })
          .fail(function() {
            console.log("error");
          })
          .always(function() {
            $('tbody').removeClass('table-loader');
          });
        });


	  	});
  </script>
@endsection