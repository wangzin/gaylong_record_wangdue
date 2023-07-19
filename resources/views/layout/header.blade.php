<header class="main-header">
    <a href="index2.html" class="logo">
      <span class="logo-mini">དགེ་སློང་ཡིག་ཐོ།</span>
      <span class="logo-lg"><b>དགེ་སློང་ཡིག་ཐོ།</b></span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          {{-- <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li> --}}
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="/pro_pic/{{session('User_Details')['profile_pic'] }}" onerror="this.src='{{ asset('images/user.png') }}'" class="user-image" alt="User Image">
                @if(session('User_Details')!=null)
                    {{ session('User_Details')['name'] }}
                @endif
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="/pro_pic/{{session('User_Details')['profile_pic'] }}" onerror="this.src='{{ asset('images/user.png') }}'" class="img-circle" alt="User Image">
                <p>
                    @if(session('User_Details')!=null)
                        {{ session('User_Details')['name'] }} 
                    @endif
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="/profile" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                    <a href="/ཕྱི་མཐོན" class="btn btn-default btn-flat">ཕྱི་མཐོན།</a>
                </div>
                <div class="pull-right" style="padding-top: 12px;">
                    <a href="/password_change" style="padding-right: 70px; padding-left: 83px;" class="btn btn-default btn-flat bg-teal"><span class="h4">གསང་ཚིག་ དུས་མཐུན་བཛོ།</span></a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
