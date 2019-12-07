<!-- start: Header -->
<div class="navbar">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
        <a class="brand" href="{{URL::to('/dashboard')}}"><img src="{{URL::to('/frontend/images/home/logo.png')}}" /></a>
            <!-- start: Header Menu -->
            <div class="nav-no-collapse header-nav">
                <ul class="nav pull-right">
                    <li>
                     <a href="{{ URL::to('/')}}">Visit Shop</a>
                    </li>
                    
                    <!-- start: User Dropdown -->
                    <li class="dropdown">
                        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="halflings-icon white user"></i> {{Session::get('admin_name')}}
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-menu-title">
                                 <span>Account Settings</span>
                            </li>
                            <li><a href="#"><i class="halflings-icon user"></i> Profile</a></li>
                            <li><a href="{{URL::to ('/logout') }}"><i class="halflings-icon off"></i> Logout</a></li>
                        </ul>
                    </li>
                    <!-- end: User Dropdown -->
                </ul>
            </div>
            <!-- end: Header Menu -->

        </div>
    </div>
</div>
<!-- start: Header -->

    <div class="container-fluid-full">
    <div class="row-fluid">

        <!-- start: Main Menu -->
        <div id="sidebar-left" class="span2">
            <div class="nav-collapse sidebar-nav">
                <ul class="nav nav-tabs nav-stacked main-menu">
                    <li><a href="{{URL::to ('/dashboard') }}"><i class="fas fa-tachometer-alt"></i><span class="hidden-tablet"> Dashboard</span></a></li>
                    <li><a href="{{URL::to ('/dashboard/categories') }}"><i class="fas fa-bookmark"></i><span class="hidden-tablet"> Categories</span></a></li>
                    <li><a href="{{URL::to ('/dashboard/categories/add') }}"><i class="fas fa-plus"></i><span class="hidden-tablet"> Add Category</span></a></li>
                    <li><a href="{{URL::to ('/dashboard/brands') }}"><i class="fas fa-tags"></i><span class="hidden-tablet"> Brands</span></a></li>
                    <li><a href="{{URL::to ('/dashboard/brands/add') }}"><i class="fas fa-plus"></i><span class="hidden-tablet"> Add Brand</span></a></li>
                    <li><a href="{{URL::to ('/dashboard/products') }}"><i class="fas fa-barcode"></i><span class="hidden-tablet"> Products</span></a></li>
                    <li><a href="{{URL::to ('/dashboard/products/add') }}"><i class="fas fa-plus"></i><span class="hidden-tablet"> Add Product  <span class="label label-important"> NEW </span></span></a></li>
                    <li><a href="{{URL::to ('/dashboard/orders') }}"><i class="fas fa-random"></i><span class="hidden-tablet"> Orders</span></a></li>
                    <li><a href="{{URL::to ('/dashboard/delivery') }}"><i class="fas fa-shipping-fast"></i><span class="hidden-tablet"> Delivery</span></a></li>
                    <li><a href="{{URL::to ('/dashboard/customers') }}"><i class="fas fa-users"></i><span class="hidden-tablet"> Customers</span></a></li>
                    <li><a href="{{URL::to ('/dashboard/messages') }}"><i class="fas fa-envelope"></i><span class="hidden-tablet"> Messages</span></a></li>
                    <li><a href="{{URL::to ('/dashboard/comments') }}"><i class="fas fa-comments"></i><span class="hidden-tablet"> Comments</span></a></li>
                </ul>
            </div>
        </div>
        <!-- end: Main Menu -->

        <noscript>
            <div class="alert alert-block span10">
                <h4 class="alert-heading">Warning!</h4>
                <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
            </div>
        </noscript>
