      <div class="top_nav">

        <div class="nav_menu">
          <nav class="" role="navigation">
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="{{ asset("images/user.png") }}" alt="">{{ Auth::user()->name }}
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                  <li><a href="javascript:;"> <i class="fa fa-user"> </i>  Profile</a>
                  </li>
                  <li>
                    <a href="javascript:;">
                      <i class="fa fa-cog"> </i> Paramétres
                    </a>
                  </li>
                  
                  <li><a href="{{ route('logout') }}" 
                                   onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();" >

                                         <i class="fa fa-sign-out"> </i> Deconnexion</a>
                                
                                <form id="logout-form" 
                                      action="{{ route('logout') }}" 
                                      method="POST" 
                                      style="display: none;">
                                
                                    {{ csrf_field() }}

                                </form>

                            </li>
                </ul>
              </li>

       
            </ul>
          </nav>
        </div>

      </div>