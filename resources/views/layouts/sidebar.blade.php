@auth

 <div class="col-md-3 left_col">
        
        <div class="left_col scroll-view">

          <div class="navbar nav_title" style="border: 0;">
            <a href="/home" class="site_title">
              <img src="{{ asset("images/img/aa.png") }}">
              <!-- <i class="fa fa-university"></i> <span> {{ config('app.name', 'Laravel') }}</span> --></a>
          </div>
          <div class="clearfix"></div>

          <!-- menu prile quick info -->
          <div class="profile">
            <div class="profile_pic">
              <img src="{{ asset("images/user.png") }}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Bonjour,</span>
              <h2>{{ Auth::user()->name }}</h2>
            </div>
          </div>
          <!-- /menu prile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            @include('admin.menu') 

          </div>
          <!-- /sidebar menu -->

        </div>
      </div>

 @endauth
