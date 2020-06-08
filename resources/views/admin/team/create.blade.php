@extends('admin.layout.master')
 
@section('page-title')
  Create Team
@endsection
 
@section('main-content')
            <section class="content">
                <!-- SELECT2 EXAMPLE -->
                <!-- form start -->
                <form name="formAdd" id="formAdd" method="post" action="/admin/team" enctype="multipart/form-data">
                    {{ csrf_field() }}
                <div class="box box-primary">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <!-- row start -->
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group {{ $errors->has('fullname') ? 'has-error' : null }}">
                                    <label for="fullname">Fullname <span class="text text-red">*</span></label>
                                    <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Fullname">
                                    <span class="text-danger">{{ $errors->first('fullname') }}</span>
                                </div>
                                <div class="form-group {{ $errors->has('designation') ? 'has-error' : null }}">
                                    <label for="designation">Designation <span class="text text-red">*</span></label>
                                    <input type="text" name="designation" class="form-control" id="designation" placeholder="Designation">
                                    <span class="text-danger">{{ $errors->first('designation') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="telephone">Telephone</label>
                                    <input type="text" name="telephone" class="form-control" id="telephone" placeholder="Telephone">
                                </div>
                                <div class="form-group">
                                    <label for="mobile">Mobile</label>
                                    <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Mobile">
                                </div>
                                <div class="form-group {{ $errors->has('email') ? 'has-error' : null }}">
                                    <label for="email">Email <span class="text text-red">*</span></label>
                                    <input type="text" name="email" class="form-control" id="email" placeholder="Email">
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group {{ $errors->has('facebook_id') ? 'has-error' : null }}">
                                    <label for="facebook_id">Facebook ID <span class="text text-red">*</span></label>
                                    <input type="text" name="facebook_id" class="form-control" id="facebook_id" placeholder="Facebook ID">
                                    <span class="text-danger">{{ $errors->first('facebook_id') }}</span>
                                </div>
                                <div class="form-group {{ $errors->has('twitter_id') ? 'has-error' : null }}">
                                    <label for="twitter_id">Twitter ID <span class="text text-red">*</span></label>
                                    <input type="text" name="twitter_id" class="form-control" id="twitter_id" placeholder="Twitter ID">
                                    <span class="text-danger">{{ $errors->first('twitter_id') }}</span>
                                </div>
                                <div class="form-group {{ $errors->has('pinterest_id') ? 'has-error' : null }}">
                                    <label for="pinterest_id">Pinterest ID <span class="text text-red">*</span></label>
                                    <input type="text" name="pinterest_id" class="form-control" id="pinterest_id" placeholder="Pinterest ID">
                                    <span class="text-danger">{{ $errors->first('pinterest_id') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="team_img">Team Image <span class="text text-red">*</span></label>
                                    <input type="file" name="team_img" class="form-control" id="team_img">
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