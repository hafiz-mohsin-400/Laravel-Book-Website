@extends('admin.layout.master')
 
@section('page-title')
  Manage Team
@endsection
 
@section('main-content')
            <section class="content">
                <!-- /.row -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            <a class="btn btn-danger btn-xm"><i class="fa fa-eye"></i></a>
                            <a class="btn btn-danger btn-xm"><i class="fa fa-eye-slash"></i></a>
                            <a class="btn btn-danger btn-xm"><i class="fa fa-trash"></i></a>
                            <a href="/admin/team/create" class="btn btn-default btn-xm" data-toggle="tooltip" title="Create"><i class="fa fa-plus"></i></a>
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
                        @if($teams)
                        <table class="table table-bordered">
                            <thead style="background-color: #F8F8F8;">
                                <tr>
                                    <th width="4%"><input type="checkbox" name="" id="checkAll"></th>
                                    <th width="30%">Fullname</th>
                                    <th width="20%">Designation</th>
                                    <th width="10%">Team Image</th>
                                    <th width="10%">Status</th>
                                    <th width="10%">Manage</th>
                                </tr>
                            </thead>
                            @foreach($teams as $team)
                            <tr>
                                <td><input type="checkbox" name="" id="" class="checkSingle"></td>
                                <td>{{ $team->fullname }}</td>
                                <td>{{ $team->designation }}</td>
                                <td>
                                @if($team->team_img == 'No image found')
                                    <img src="/assets/admin/dist/img/noimage.jpg" width="80" class="img-thumbnail">
                                 @else
                                    <img src="/uploads/{{ $team->team_img }}" width="100" class="img-thumbnail" alt="{{ $team->title }}">
                                @endif
                                </td>
                            <td>
                                <form method="post" action="/admin/team/{{$team->id}}/status">
                                  {{ csrf_field() }}
                                  {{ method_field('put') }}
                            @if($team->status == 'DEACTIVE')
                                <button class="btn btn-danger btn-sm singleStatus"><i class="fa fa-thumbs-down"></i></button>
                            @else
                                <button class="btn btn-info btn-sm singleStatus"><i class="fa fa-thumbs-up"></i></button>
                            @endif
                            </form>
                    </td>
                    <td>
                        <form method="post" action="/admin/team/{{ $team->id }}">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}    
                            <a href="/admin/team/{{ $team->id }}/edit" class="btn btn-info btn-flat btn-sm"> <i class="fa fa-edit"></i></a>
                            <button type="submit" class="btn btn-danger btn-flat btn-sm singleDelete"> <i class="fa fa-trash-o"></i></button>
                        </form>
                    </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <div class="row">
                            <div class="col-sm-6">
                                <span style="display:block;font-size:15px;line-height:34px;margin:20px 0;">
                                  Showing {{($teams->currentpage()-1)*$teams->perpage()+1}} to {{$teams->currentpage()*$teams->perpage()}} of {{$teams->total()}} entries   
                                </span>
                            </div>
                        	<div class="col-sm-6 text-right">
                                {{ $teams->links() }}
                            	<!--ul class="pagination">
									<li class="paginate_button previous"><a href="#" >Previous</a></li>
									<li class="paginate_button active"><a href="#" >1</a></li>
									<li class="paginate_button "><a href="#">2</a></li>
									<li class="paginate_button "><a href="#" >3</a></li>
									<li class="paginate_button "><a href="#">4</a></li>
									<li class="paginate_button "><a href="#">5</a></li>
									<li class="paginate_button "><a href="#">6</a></li>
									<li class="paginate_button next"><a href="#" >Next</a></li>
								</ul>-->
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
        self.html('<i class="fa fa-thumbs-down"></i>')
      }
    })
    .fail(function() {
      alert('Opps! Something Went Wrong');
    })

    });

    $(".singleDelete").on('click', function(e) {
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
                alert('Opps! Something Went Wrong');
            })
        }
        else
        {
            return false;
        }
    });




})
</script>
@endsection