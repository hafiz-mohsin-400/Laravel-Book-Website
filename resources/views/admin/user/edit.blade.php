@extends('admin.layout.master')

@section('page-title')
  Edit User
@endsection

@section('main-content')
            <!-- Main content -->
            <section class="content">
                <!-- SELECT2 EXAMPLE -->
                <!-- form start -->
                <form name="formEdit" id="formEdit" method="post" action="/admin/user/{{ $user->id }}" enctype="multipart/form-data">
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
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : null }}">
                                    <label for="name">Name <span class="text text-red">*</span></label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{ $user->name }}">
                                    @if($errors->has('name')) <span class="text-red">{{ $errors->first('name') }}</span> @endif
                                </div>
                                <div class="form-group {{ $errors->has('designation') ? 'has-error' : null }}">
                                    <label for="designation">Designation <span class="text text-red">*</span></label>
                                    <input type="text" class="form-control" name="designation" id="designation" placeholder="Designation" value="{{ $user->designation }}">
                                    @if($errors->has('designation')) <span class="text-red">{{ $errors->first('designation') }}</span> @endif
                                </div>
                                <div class="form-group {{ $errors->has('email') ? 'has-error' : null }}">
                                    <label for="email">Email <span class="text text-red">*</span></label>
                                    <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="{{ $user->email }}">
                                    @if($errors->has('email')) <span class="text-red">{{ $errors->first('email') }}</span> @endif
                                </div>
                                <div class="form-group {{ $errors->has('password') ? 'has-error' : null }}">
                                    <label for="password">Password<span class="text text-red">*</span></label>
                                    <input type="text" class="form-control" name="password" id="password" placeholder="Password" value="{{ $user->password }}">
                                    @if($errors->has('password')) <span class="text-red">{{ $errors->first('password') }}</span> @endif
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="user_img">User Image <span class="text text-red">*</span></label>
                                    <input type="file" class="form-control" name="user_img" id="user_img" >
                                </div>
                                <div class="form-group {{ $errors->has('bio') ? 'has-error' : null }}">
                                <label>Bio</label>
                                <textarea class="form-control" name="bio" id="bio" rows="5" placeholder="Bio">{{ $user->bio }}</textarea>
                                @if($errors->has('bio')) <span class="text-red">{{ $errors->first('bio') }}</span> @endif
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