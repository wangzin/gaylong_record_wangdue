<aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="/pro_pic/{{session('User_Details')['profile_pic'] }}" onerror="this.src='{{ asset('images/user.png') }}'" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>
            @if(session('User_Details')!=null)
                {{ session('User_Details')['name'] }}<br>
            @endif
          </p>
        </div>
      </div>
      <ul class="sidebar-menu" data-widget="tree">
        <li><a href="/སྟོན་སྟེགས" class="h4"><i class="fa fa-dashboard"></i> <span class="h3"> སྟོན་སྟེགས། </span></a></li>
        {{-- @if(session('User_Details')!=null && strpos(session('User_Details')['role_name'],'Admin')!==false) --}}
          <li class="treeview">
              <a href="#">
              <i class="fa fa-laptop"></i>
              <span class="h3">བདག་སྐྱོང་།</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
              </span>
              </a>
              <ul class="treeview-menu">
              <li><a href="/བདག་སྐྱོང/ལག་ལེན་པའི་རྒྱས"><i class="fa fa-angle-double-right"></i>
                <span class="h3">ལག་ལེན་པ་ བདག་སྐྱོང་།</span></a></li>
              </ul>
          </li>
        {{-- @endif --}}
        <li><a href="/བདག་སྐྱོང/དགེ་སློང་ཐོ་བཀོད"><i class="fa fa-list"></i> <span class="h3">དགེ་སློང་གི་ཐོ་བཀོད། </span></a></li>
        <li><a href="/བདག་སྐྱོང/ཐོ་བཀོད་འཚོལ/འཚོལ"><i class="fa fa-search"></i> <span class="h3">ཐོ་བཀོད་འཚོལ། </span></a></li>
        <!-- <li><a href="/བདག་སྐྱོང/ཐོ་བཀོད་འཚོལ/ངོ་སྤྲེད་ཨང"><i class="fa fa-user"></i> <span class="h3">ངོ་སྤྲེད་ལག་ཁྱེར </span></a></li> -->
      </ul>
    </section>
  </aside>
