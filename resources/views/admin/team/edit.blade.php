@extends('admin.layout.master')
 
@section('page-title')
  Edit Team
@endsection
 
@section('main-content')
            <section class="content">
                <!-- SELECT2 EXAMPLE -->
                <!-- form start -->
                <form name="formEdit" id="formEdit" method="post" action="/admin/team/{{$team->id }}" enctype="multipart/form-data">
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
                                <div class="form-group {{ $errors->has('fullname') ? 'has-error' : null }}">
                                    <label for="fullname">Fullname <span class="text text-red">*</span></label>
                                    <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Fullname" value="{{ $team->fullname }}">
                                    @if($errors->has('fullname')) <span class="text-red">{{ $errors->first('fullname') }}</span> @endif
                                </div>
                                <div class="form-group {{ $errors->has('designation') ? 'has-error' : null }}">
                                    <label for="designation">Designation <span class="text text-red">*</span></label>
                                    <input type="text" name="designation" class="form-control" id="designation" placeholder="Designation" value="{{ $team->designation }}">
                                    @if($errors->has('designation')) <span class="text-red">{{ $errors->first('designation') }}</span> @endif
                                </div>
                                <div class="form-group">
                                    <label for="telephone">Telephone</label>
                                    <input type="text" name="telephone" class="form-control" id="telephone" placeholder="Telephone" value="{{ $team->telephone }}">
                                </div>
                                <div class="form-group">
                                    <label for="mobile">Mobile</label>
                                    <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Mobile" value="{{ $team->mobile }}">
                                </div>
                                <div class="form-group {{ $errors->has('email') ? 'has-error' : null }}">
                                    <label for="email">Email <span class="text text-red">*</span></label>
                                    <input type="text" name="email" class="form-control" id="email" placeholder="Email" value="{{ $team->email }}">
                                    @if($errors->has('email')) <span class="text-red">{{ $errors->first('email') }}</span> @endif
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="team_img">Team Image <span class="text text-red">*</span></label>
                                    <input type="file" name="team_img" class="form-control" id="team_img">
                                </div>
                                <div class="form-group {{ $errors->has('facebook_id') ? 'has-error' : null }}">
                                    <label for="facebook_id">Facebook ID <span class="text text-red">*</span></label>
                                    <input type="text" name="facebook_id" class="form-control" id="facebook_id" placeholder="Facebook ID" value=" {{ $team->facebook_id}} ">
                                    @if($errors->has('facebook_id')) <span class="text-red">{{ $errors->first('facebook_id') }}</span> @endif
                                </div>
                                <div class="form-group {{ $errors->has('twitter_id') ? 'has-error' : null }}">
                                    <label for="twitter_id">Twitter ID <span class="text text-red">*</span></label>
                                    <input type="text" name="twitter_id" class="form-control" id="twitter_id" placeholder="Twitter ID" value="{{$team->twitter_id}}">
                                    @if($errors->has('twitter_id')) <span class="text-red">{{ $errors->first('twitter_id') }}</span> @endif
                                </div>
                                <div class="form-group {{ $errors->has('pinterest_id') ? 'has-error' : null }}">
                                    <label for="pinterest_id">Pinterest ID <span class="text text-red">*</span></label>
                                    <input type="text" name="pinterest_id" class="form-control" id="pinterest_id" placeholder="Pinterest ID" value="{{$team->pinterest_id }}">
                                    @if($errors->has('pinterest_id')) <span class="text-red">{{ $errors->first('pinterest_id') }}</span> @endif
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