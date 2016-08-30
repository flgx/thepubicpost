@if(Auth::check())
  
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
        @if(Auth::user()->profile_image && Auth::user()->facebook_id == 'null')
        
          <img src="{{asset('img/users/profile').'/profile_'.Auth::user()->profile_image}}" class="img-circle" alt="The Post Page ">
        @elseif(Auth::user()->facebook_id != 'null' && Auth::user()->profile_image )          
          <img src="{{Auth::user()->profile_image}}" class="img-circle" alt="The Post Page ">
        @else
         <img src="{{asset('img/profile.png')}}" class="img-circle" alt="The Post Page ">
        @endif
        </div>
        
        <div class="pull-left info">
          <p>{{Auth::user()->name}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
        s
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        @if(Auth::user()->type == 'admin')
        <li class="treeview {{ (Request::is('admin/categories') ? 'active' : '') }}">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Categories</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ (Request::is('admin/categories') ? 'active' : '') }}"><a href="{{url('admin/categories')}}"><i class="fa fa-circle-o"></i> View Categories</a></li>
            <li class="{{ (Request::is('admin/categories/create') ? 'active' : '') }}"><a href="{{url('admin/categories/create')}}"><i class="fa fa-circle-o"></i> Create Category</a></li>
          </ul>
        </li>
        <li class="treeview {{ (Request::is('admin/tags') ? 'active' : '') }}">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Tags</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ (Request::is('admin/tags') ? 'active' : '') }}"><a href="{{url('admin/tags')}}"><i class="fa fa-circle-o"></i> View Tags</a></li>
            <li class="{{ (Request::is('admin/tags/create') ? 'active' : '') }}"><a href="{{url('admin/tags/create')}}"><i class="fa fa-circle-o"></i> Create Tag</a></li>
          </ul>
        </li>
        @endif
        <li class="treeview {{ (Request::is('admin/posts') ? 'active' : '') }}{{ (Request::is('admin/posts/create') ? 'active' : '') }}{{ (Request::is('admin/posts/all') ? 'active' : '') }}">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Posts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @if(Auth::user()->type == 'admin')
            <li class="{{ (Request::is('admin/all') ? 'active' : '') }}"><a href="{{url('admin/posts/all')}}"><i class="fa fa-circle-o"></i> All posts</a></li>
            @endif
            <li class="{{ (Request::is('admin/posts') ? 'active' : '') }}"><a href="{{url('admin/posts')}}"><i class="fa fa-circle-o"></i> View My Posts</a></li>
            <li class="{{ (Request::is('admin/posts/create') ? 'active' : '') }}"><a href="{{url('admin/posts/create')}}"><i class="fa fa-circle-o"></i> Create Post</a></li>
          </ul>
        </li>
        <li class="treeview {{ (Request::is('admin/photos') ? 'active' : '') }}{{ (Request::is('admin/photos/create') ? 'active' : '') }}{{ (Request::is('admin/photos/all') ? 'active' : '') }}">
          <a href="#">
            <i class="fa fa-photo"></i> <span>Photo Posts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @if(Auth::user()->type == 'admin')
            <li class="{{ (Request::is('admin/photos/all') ? 'active' : '') }}"><a href="{{url('admin/photos/all')}}"><i class="fa fa-photo"></i> All Photo Posts</a></li>
            @endif
            <li class="{{ (Request::is('admin/photos') ? 'active' : '') }}"><a href="{{url('admin/photos')}}"><i class="fa fa-photo"></i> View My Photo Posts</a></li>
            <li class="{{ (Request::is('admin/photos/create') ? 'active' : '') }}"><a href="{{url('admin/photos/create')}}"><i class="fa fa-photo"></i> Create Photo Post</a></li>
          </ul>
        </li>
        <li class="treeview {{ (Request::is('admin/videos') ? 'active' : '') }}{{ (Request::is('admin/videos/create') ? 'active' : '') }}{{ (Request::is('admin/videos/all') ? 'active' : '') }}">
          <a href="#">
            <i class="fa fa-video-camera"></i> <span>Video Posts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            @if(Auth::user()->type == 'admin')
            <li class="{{ (Request::is('admin/videos/all') ? 'active' : '') }}"><a href="{{url('admin/videos/all')}}"><i class="fa fa-circle"></i> All Video Posts</a></li>
            @endif
            <li class="{{ (Request::is('admin/videos') ? 'active' : '') }}"><a href="{{url('admin/videos')}}"><i class="fa fa-circle"></i> View My Video Posts</a></li>
            <li class="{{ (Request::is('admin/videos/create') ? 'active' : '') }}"><a href="{{url('admin/videos/create')}}"><i class="fa fa-photo"></i> Create Video Post</a></li>
          </ul>
        </li>
        <li class="treeview {{ (Request::is('admin/ebooks') ? 'active' : '') }}{{ (Request::is('admin/ebooks/create') ? 'active' : '') }}{{ (Request::is('admin/ebooks/all') ? 'active' : '') }}">
          <a href="#">
            <i class="fa fa-book"></i> <span>Ebooks</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          @if(Auth::user()->type == 'admin')
            <li class="{{ (Request::is('admin/ebooks/all') ? 'active' : '') }}"><a href="{{url('admin/ebooks/all')}}"><i class="fa fa-book"></i> All Ebooks</a></li>
          @endif
            <li class="{{ (Request::is('admin/ebook') ? 'active' : '') }}"><a href="{{url('admin/ebooks')}}"><i class="fa fa-book"></i> View My Ebooks</a></li>
            <li class="{{ (Request::is('admin/ebooks/create') ? 'active' : '') }}"><a href="{{url('admin/ebooks/create')}}"><i class="fa fa-book"></i> Create Ebook</a></li>
          </ul>
        </li>
        @if(Auth::user()->type == 'admin')
        <li class="{{ (Request::is('admin/users') ? 'active' : '') }}"><a href="{{url('admin/users')}}"><i class="fa fa-group"></i>All Users</a>
        </li>
        @endif
        <li class="{{ (Request::is('admin/users/'.Auth::user()->id.'/edit') ? 'active' : '') }}"><a href="{{url('admin/users/'.Auth::user()->id.'/edit/')}}"><i class="fa fa-user"></i>Edit Profile</a>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
@endif