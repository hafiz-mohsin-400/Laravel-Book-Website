<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('page-title') | American Books</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="/assets/admin/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="/assets/admin/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="/assets/admin/dist/css/skins/_all-skins.min.css">
 
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
 
  <header class="main-header">
    <!-- Logo -->
    <a href="/assets/index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>C</b>MS</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>CMS</b> Panel</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
 
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="/assets/admin/dist/img/mohsin.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="/assets/admin/dist/img/mohsin.jpg" class="img-circle" alt="User Image">
 
                <p>
                  {{ Auth::user()->name }} - {{ Auth::user()->designation }}
                  <small>Member since Nov. 2019</small>
                </p>
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="/admin/profile" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a class="btn btn-default btn-flat" href="{{ route('logout') }}">Sign out</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
         
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="/assets/admin/dist/img/mohsin.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="{{ Request::is( 'admin/dashboard') ? 'active' : null }} treeview">
            <a href="/admin/dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
        </li>
 		<li class="{{ Request::is( 'admin/category') || Request::is( 'admin/category/create' ) ? 'active' : '' }} treeview">
            <a href="admin/category">
                <i class="fa fa-tasks"></i> <span>Category</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
                @php
                	use App\Category;
                	$category_count_deactive = Category::where('status', 'DEACTIVE')->count();
                	$category_count_active = Category::where('status', 'ACTIVE')->count();
                @endphp
                <small class="label bg-red" title="deactive">{{ $category_count_deactive }}</small>
                <small class="label bg-primary" title="active">{{ $category_count_active }}</small>
            </a>
            <ul class="treeview-menu">
                <li class="{{ Request::is('admin/category/create') ? 'active' : null }}"><a href="/admin/category/create"><i class="fa fa-circle-o"></i> Create Category </a></li>
                <li class="{{ Request::is('admin/category') ? 'active' : null }}"><a href="/admin/category"><i class="fa fa-circle-o"></i> View Category </a></li>
            </ul>
        </li>
 
        <li class="{{ Request::is( 'admin/author') || Request::is( 'admin/author/create' ) ? 'active' : '' }} treeview">
            <a href="admin/author">
                <i class="fa fa-pencil"></i> <span>Author</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
                @php
                	use App\Author;
                	$author_count_deactive = Author::where('status', 'DEACTIVE')->count();
                	$author_count_active = Author::where('status', 'ACTIVE')->count();
                @endphp
                <small class="label bg-red" title="deactive">{{ $author_count_deactive }}</small>
                <small class="label bg-primary" title="active">{{ $author_count_active }}</small>
            </a>
            <ul class="treeview-menu">
                <li class="{{ Request::is('admin/author/create') ? 'active' : null }}"><a href="/admin/author/create"><i class="fa fa-circle-o"></i> Create Author </a></li>
                <li class="{{ Request::is('admin/author') ? 'active' : null }}"><a href="/admin/author"><i class="fa fa-circle-o"></i> View Author </a></li>
            </ul>
        </li>
 
        <li class="{{ Request::is( 'admin/book') || Request::is( 'admin/book/create' ) ? 'active' : '' }} treeview">
            <a href="#">
                <i class="fa fa-book"></i> <span>Book</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
                @php
                  use App\Book;
                  $book_count_deactive = Book::where('status', 'DEACTIVE')->count();
                  $book_count_active = Book::where('status', 'ACTIVE')->count();
                @endphp
                <small class="label bg-red" title="deactive">{{ $book_count_deactive }}</small>
                <small class="label bg-primary" title="active">{{ $book_count_active }}</small>
            </a>
            <ul class="treeview-menu">
                <li class="{{ Request::is('admin/book/create') ? 'active' : null }}"><a href="/admin/book/create"><i class="fa fa-circle-o"></i> Create Book </a></li>
                <li class="{{ Request::is('admin/book') ? 'active' : null }}"><a href="/admin/book"><i class="fa fa-circle-o"></i> View Book </a></li>
            </ul>
        </li>
 
        <li class="{{ Request::is( 'admin/media') || Request::is( 'admin/media/create' ) ? 'active' : '' }} treeview">
            <a href="#">
                <i class="fa fa-film"></i> <span>Media</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
                @php
                  use App\Media;
                  $media_count_deactive = Media::where('status', 'DEACTIVE')->count();
                  $media_count_active = Media::where('status', 'ACTIVE')->count();
                @endphp
                <small class="label bg-red" title="deactive">{{ $media_count_deactive }}</small>
                <small class="label bg-primary" title="active">{{ $media_count_active }}</small>
            </a>
            <ul class="treeview-menu">
                <li class="{{ Request::is('admin/media/create') ? 'active' : null }}"><a href="/admin/media/create"><i class="fa fa-circle-o"></i> Create Media </a></li>
                <li class="{{ Request::is('admin/media') ? 'active' : null }}"><a href="/admin/media"><i class="fa fa-circle-o"></i> View Media </a></li>
            </ul>
        </li>
 		<li class="{{ Request::is( 'admin/user') ? 'active' : '' }} treeview">
            <a href="#">
                <i class="fa fa-users"></i> <span>User</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
                @php
                  use App\User;
                  $user_count_deactive = User::where('status', 'DEACTIVE')->count();
                  $user_count_active = User::where('status', 'ACTIVE')->count();
                @endphp
                <small class="label bg-red" title="deactive">{{ $user_count_deactive }}</small>
                <small class="label bg-primary" title="active">{{ $user_count_active }}</small>
            </a>
            <ul class="treeview-menu">
                
                <li class="{{ Request::is('admin/user') ? 'active' : null }}"><a href="/admin/user/"><i class="fa fa-circle-o"></i> View User </a></li>
            </ul>
        </li>
        <li class="{{ Request::is( 'admin/team') || Request::is( 'admin/team/create' ) ? 'active' : '' }} treeview">
            <a href="#">
                <i class="fa fa-user-plus"></i> <span>Team</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
                @php
                  use App\Team;
                  $team_count_deactive = Team::where('status', 'DEACTIVE')->count();
                  $team_count_active = Team::where('status', 'ACTIVE')->count();
                @endphp
                <small class="label bg-red" title="deactive">{{ $team_count_deactive }}</small>
                <small class="label bg-primary" title="active">{{ $team_count_active }}</small>
            </a>
            <ul class="treeview-menu">
                <li class="{{ Request::is('admin/team/create') ? 'active' : null }}"><a href="/admin/team/create"><i class="fa fa-circle-o"></i> Create Team </a></li>
                <li class="{{ Request::is('admin/team') ? 'active' : null }}"><a href="/admin/team"><i class="fa fa-circle-o"></i> View Team </a></li>
            </ul>
        </li>
	</ul>
    </section>
    <!-- /.sidebar -->
  </aside>
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>@yield('page-title')</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Simple</li>
      </ol>
    </section>
 
  @yield('main-content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2019-2020 <a href="https://www.alfateemacademy.com/" target="_blank">Al-Fateem Academy</a>.</strong> All rights reserved.
  </footer>
  
  
<!-- ./wrapper -->
 
<script src="/assets/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="/assets/admin/bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="/assets/admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="/assets/admin/dist/js/jquery.stringToSlug.min.js"></script>
<script src="/assets/admin/dist/js/app.min.js"></script>
<script src="/assets/admin/dist/js/demo.js"></script>
<script src="/assets/admin/dist/js/my_scripts.js"></script>

@yield('scripts')
</body>
</html>