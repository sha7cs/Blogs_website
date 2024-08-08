<!DOCTYPE html>
<html>

<head>
<link rel="icon" type="image/png" sizes="512x512" href={{asset("frontend/favicon/favicon-512x512.png")}}>


<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Website</title>
    <link href="{{asset('Backend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('Backend/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('Backend/css/sb-admin.css')}}" rel="stylesheet">
    <style>

    .dropdown-menu .fa-bell {
        color: white;
    }

    body {
        background-color: #ececec;
    }

    .navbar {
        background-color: #ececec;
        border: 1px solid #d2d2d2;
        height: 70px;
    }

    .navbar-brand {
        color: #000000;
        font-size: 20px;
        line-height: 30px;
    }

    .sidebar {
        background-color: #f6f6f6;
        color: #EADBC8;
        width: 250px;
        position: fixed;
        height: 100%;
        overflow-y: auto;
        border: 1px solid #ececec;
    }

    .sidebar ul {
        list-style: none;
        padding: 0;
    }

    .sidebar li {
        margin-bottom: 10px;
    }

    .sidebar a {
        color: white;
        text-decoration: none;
    }

    .sidebar a:hover {
        text-decoration: underline;
    }

    .content {
        margin-left: 250px;
        padding: 20px;
    }
    .search-button {
    background-color: #6F4AE3; /* Change this to your desired color */
    color: #fff; /* Change the text color if needed */
  }

  .search-input:focus {
    border-color: #6F4AE3; /* focus color */
    box-shadow: 0 0 8px rgba(111, 74, 227, 0.5); /*shadow color and intensity */
  }
  .navbar-top-links {
    float: right;
    margin-right: 20px; /* Adjust this margin to position the links accordingly */
}
  
    
</style>
</head>

<body>
<div id="wrapper">

<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">
      <img src="{{asset('frontend/img/branding/planet-logo.svg')}}" class="bsb-tpl-logo" style="width: 100px; height: auto; margin-right: 10px;" alt="Planet Logo">
      <span class="blog-website-text" style="color: #000000; font-size: 10px;">Blog Website</span>
      </a>
  </div>
  <!-- /.navbar-header -->

  <ul class="nav navbar-top-links navbar-right">
    <!-- Profile Dropdown -->
    <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        <i class="fa fa-user fa-fw" style="color: #6F4AE3;"></i> <i class="fa fa-caret-down" style="color: #6F4AE3;"></i>
      </a>
      <ul class="dropdown-menu dropdown-user">
        <li><a href="/Back-end/UserProfile"><i class="fa fa-user fa-fw"></i> User Profile</a></li>
        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a></li>
        <li class="divider"></li>
        <li><a href="/Back-end/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
      </ul>
      <!-- /.dropdown-user -->
    </li>
    <!-- /.dropdown -->
    <!-- Alerts Dropdown -->
    <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        <i class="fa fa-bell fa-fw" style="color: #6F4AE3;"></i> <i class="fa fa-caret-down" style="color: #6F4AE3;"></i>
      </a>
      <ul class="dropdown-menu dropdown-alerts">
        <li>
          <a href="#">
            <div>
              <i class="fa fa-comment fa-fw"></i> New Comment
              <span class="pull-right text-muted small">4 minutes ago</span>
            </div>
          </a>
        </li>
        <li class="divider"></li>
        <li>
          <a href="#">
            <div>
              <i class="fa fa-twitter fa-fw"></i> 3 New Followers
              <span class="pull-right text-muted small">12 minutes ago</span>
            </div>
          </a>
        </li>
        <li class="divider"></li>
        <li>
          <a class="text-center" href="#">
            <strong>See All Alerts</strong>
            <i class="fa fa-angle-right"></i>
          </a>
        </li>
      </ul>
      <!-- /.dropdown-alerts -->
    </li>
    <!-- /.dropdown -->
  </ul>
  <!-- /.navbar-top-links -->
</nav>

<div class="navbar-default navbar-static-side" role="navigation" style="margin-top: 10px;">
  <div class="sidebar">
    <ul class="nav" id="side-menu">
      <li class="sidebar-search">
        <div class="input-group custom-search-form">
          <input type="text" class="form-control search-input" placeholder="Search...">
          <span class="input-group-btn">
            <button class="btn btn-default search-button" type="button">
              <i class="fa fa-search"></i>
            </button>
          </span>
        </div>
        <!-- /input-group -->
      </li>
      <li>
        <a href="/Back-end/dashboard" style="color: #6F4AE3"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
      </li>
      <li>
        <a href="/Back-end/blogs" style="color:#6F4AE3"><i class="fa fa-tasks fa-fw"></i> Blogs</a>
      </li>
      <li>
        <a href="/Back-end/writters" style="color: #6F4AE3"><i class="fa fa-edit fa-fw"></i> Writters</a>
      </li>
    </ul>
    <!-- /#side-menu -->
  </div>
  <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
</nav>
@yield('content')
 <!-- /#wrapper -->
 <script src="{{ asset('Backend/js/jquery-1.10.2.js') }}"></script>
    <script src="{{ asset('Backend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('Backend/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>

    <!-- Page-Level Plugin Scripts - Dashboard -->
    <script src="{{ asset('Backend/js/plugins/morris/raphael-2.1.0.min.js') }}"></script>
    <script src="{{ asset('Backend/js/plugins/morris/morris.js') }}"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="{{ asset('Backend/js/sb-admin.js') }}"></script>

    <!-- Page-Level Demo Scripts - Dashboard - Use for reference -->
    <script src="{{ asset('Backend/js/demo/dashboard-demo.js') }}"></script>
    <script src="{{asset('Backend/js/bootstrap.bundle.min.js')}}"></script>
</body>

</html>