@extends('admin.layout.master')
@section('page-title')
  Profile
@endsection
@section('main-content')
<section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="/assets/admin/dist/img/user4-128x128.jpg" alt="User profile picture">
              <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>
              <p class="text-muted text-center">{{ Auth::user()->designation }}</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-default">Edit your Profile</button>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="{{ $errors->has('updatepassword') || $errors->has('oldpassword') || $errors->has('retypepassword')  ? '' : 'active'  }}"><a href="#activity" data-toggle="tab">Bio</a></li>
              <li class="{{ $errors->has('updatepassword') || $errors->has('oldpassword') || $errors->has('retypepassword')  ? 'active' : ''  }}"><a href="#settings" data-toggle="tab">Change Password</a></li>
            </ul>
            <div class="tab-content">
              <div class="{{ $errors->has('updatepassword') || $errors->has('oldpassword') || $errors->has('retypepassword') ? '' : 'active'  }} tab-pane" id="activity">
                <!-- Post -->
                <div class="post">
                  <p>{{ Auth::user()->bio }}</p>
                </div>
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->

              <div class="{{ $errors->has('updatepassword') || $errors->has('oldpassword') || $errors->has('retypepassword')  ? 'active' : ''  }} tab-pane" id="settings">
              	@if(Session::has('msg'))
	                <div class="alert aler-success">
	                    Your Password has been Changed  
	                </div>
	              @endif
	              @if(Session::has('error'))
	                <div class="alert aler-danger">
	                    opps something went wrong
	                </div>
	              @endif
				<form class="form-horizontal" method="post" action="{{ Route('updatepassword') }}">
                                {{ csrf_field() }}
                                <div class="form-group {{ $errors->has('oldpassword') ? 'has-error' : '' }}">
                                    <label for="inputName" class="col-sm-2 control-label">Old Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="oldpassword" name="oldpassword" placeholder="Old Password">
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('updatepassword') ? 'has-error' : '' }}">
                                    <label for="inputEmail" class="col-sm-2 control-label">New Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="updatepassword" class="form-control" id="inputEmail" placeholder="New Password">
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('retypepassword') ? 'has-error' : '' }}">
                                    <label for="inputName" class="col-sm-2 control-label">Retype Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="retypepassword" class="form-control" id="inputName" placeholder="Retype Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger">Update Password</button>
                                    </div>
                                </div>
                            </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ayaz Ahmed Mast</h4>
            </div>
            <div class="modal-body">
                <form id="profileForm" method="post" action="{{ route('profile.update') }}" class="form-horizontal">
                    <div id="msg"></div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ Auth::user()->name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="designation" class="col-sm-2 control-label">Designation</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="designation" id="designation" placeholder="Designation" value="{{ Auth::user()->designation }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ Auth::user()->email }}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="bio" class="col-sm-2 control-label">Bio</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="bio" id="bio" rows="6" placeholder="Enter ...">{{ Auth::user()->bio }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="user_img" class="col-sm-2 control-label">Image</label>
                        <div class="col-sm-10">
                            <input type="file" id="user_img" name="user_img">
                        </div>
                    </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary profileSubmit">Save changes</button>
            </div>
            </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection

@section('scripts')
  <script>
    $(document).ready(function(){
      $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
      });
      $('body').on('click', '.profileSubmit', function(e) {
        e.preventDefault();
        var self = $(this);
        var form = self.closest('form');
        var url = self.attr('action');
        $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        cache       : false,
        contentType : false,
        processData : false,
        data: new FormData($('#profileForm')[0]),
      })
        .done(function(data) {

        if (data.status == 'true') {
          $('#msg').html('')
          $('#msg').html(' <div class="alert alert-success">Profile updated</div>')

          setTimeout(function(){   
            $('#msg').html('') 
            $('#modal-default').modal('toggle');
          }, 3000);
        }
        console.log(data);
      })
        .fail(function(data) {
        console.log(data);
      })
      .always(function() {
        console.log("complete");
      });

    });
  });
  </script>
@endsection