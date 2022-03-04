<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="./">{{ Auth::user()->name }}</a>
            <a class="navbar-brand hidden" href="./">{{ Auth::user()->name }}</a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{url('admindashboard')}}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                </li>
                <h3 class="menu-title">CMS</h3><!-- /.menu-title -->
                <li class="active">
                  <a href="{{url('/add_event')}}">
                      <i class="menu-icon fa fa-user"></i>Add Event
                  </a>
                </li>
                <li class="active">
                    <a href="{{url('/events')}}">
                        <i class="menu-icon fa fa-user"></i>Total Events
                    </a>
                  </li>
                  <li class="active">
                    <a href="{{url('admin/dashboard/product')}}">
                        <i class="menu-icon fa fa-user"></i>Product
                    </a>
                  </li>
                  <li class="active">
                    <a href="{{url('admin/orders')}}">
                        <i class="menu-icon fa fa-user"></i>Order
                    </a>
                  </li>

                </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
