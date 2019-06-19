  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      @include('admin.layouts.menu')
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ url('design/adminlte') }}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ admin()->user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->

      {{-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> --}}

      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        

        <li class="treeview {{ active_menu('settings')[0] }}">
          <a href="#">
            <i class="fa fa-list-ul"></i> <span>{{ trans('admin.dashboard') }}</span>
            <span class="pull-right-container">
            </span>
          </a>
          <ul class="treeview-menu" style="{{ active_menu('settings')[1] }}">
            <li class=""><a href="{{ aurl('') }}"><i class="fa fa-cog"></i>{{ trans('admin.dashboard') }}</a></li>
            <li class=""><a href="{{ aurl('settings') }}"><i class="fa fa-cog"></i>{{ trans('admin.settings') }}</a></li>
          </ul>
        </li>

        <li class="treeview {{ active_menu('admin')[0] }}">
          <a href="#">
            <i class="fa fa-users"></i> <span>{{ trans('admin.admin') }}</span>
            <span class="pull-right-container">
            </span>
          </a>
          <ul class="treeview-menu" style="{{ active_menu('admin')[1] }}">
            <li class=""><a href="{{ aurl('admin') }}"><i class="fa fa-users"></i>{{ trans('admin.admin') }}</a></li>
            <li class=""><a href="{{ aurl('admin/create') }}"><i class="fa fa-plus"></i>{{ trans('admin.add') }}</a></li>

          </ul>
        </li>

        <li class="treeview {{ active_menu('users')[0] }}">
          <a href="#">
            <i class="fa fa-users"></i> <span>{{ trans('admin.users') }}</span>
            <span class="pull-right-container">
            </span>
          </a>
          <ul class="treeview-menu" style="{{ active_menu('users')[1] }}">
            <li class=""><a href="{{ aurl('users') }}"><i class="fa fa-users"></i>{{ trans('admin.users') }}</a></li>
            <li class=""><a href="{{ aurl('users/create') }}"><i class="fa fa-plus"></i>{{ trans('admin.add') }}</a></li>
          </ul>
        </li>

        <li class="treeview {{ active_menu('comments')[0] }}">
          <a href="#">
            <i class="fa fa-info-circle"></i> <span>{{ trans('admin.comments') }}</span>
            <span class="pull-right-container">
            </span>
          </a>
          <ul class="treeview-menu" style="{{ active_menu('comments')[1] }}">
            <li class=""><a href="{{ aurl('comments') }}"><i class="fa fa-info-circle"></i>{{ trans('admin.comments') }}</a></li>
            <li class=""><a href="{{ aurl('comments/create') }}"><i class="fa fa-plus"></i>{{ trans('admin.add') }}</a></li>
          </ul>
        </li>

        <li class="treeview {{ active_menu('departments')[0] }}">
          <a href="#">
            <i class="fa fa-list"></i> <span>{{ trans('admin.departments') }}</span>
            <span class="pull-right-container">
            </span>
          </a>
          <ul class="treeview-menu" style="{{ active_menu('departments')[1] }}">
            <li class=""><a href="{{ aurl('departments') }}"><i class="fa fa-list"></i>{{ trans('admin.departments') }}</a></li>
            <li class=""><a href="{{ aurl('departments/create') }}"><i class="fa fa-plus"></i>{{ trans('admin.add') }}</a></li>
          </ul>
        </li>

        <li class="treeview {{ active_menu('messages')[0] }}">
          <a href="#">
            <i class="fa fa-send"></i> <span>{{ trans('admin.messages') }}</span>
            <span class="pull-right-container">
            </span>
          </a>
          <ul class="treeview-menu" style="{{ active_menu('messages')[1] }}">
            <li class=""><a href="{{ aurl('messages') }}"><i class="fa fa-send"></i>{{ trans('admin.messages') }}</a></li>
            <li class=""><a href="{{ aurl('messages/create') }}"><i class="fa fa-plus"></i>{{ trans('admin.add') }}</a></li>
          </ul>
        </li>

        <li class="treeview {{ active_menu('likes')[0] }}">
          <a href="#">
            <i class="fa fa-thumbs-up"></i> <span>{{ trans('admin.likes') }}</span>
            <span class="pull-right-container">
            </span>
          </a>
          <ul class="treeview-menu" style="{{ active_menu('likes')[1] }}">
            <li class=""><a href="{{ aurl('likes') }}"><i class="fa fa-thumbs-up"></i>{{ trans('admin.likes') }}</a></li>
            
          </ul>
        </li>


{{--         <li class="treeview {{ active_menu('likes')[0] }}">
          <a href="#">
            <i class="fa fa-info-circle"></i> <span>{{ trans('admin.likes') }}</span>
            <span class="pull-right-container">
            </span>
          </a>
          <ul class="treeview-menu" style="{{ active_menu('likes')[1] }}">
            <li class=""><a href="{{ aurl('likes') }}"><i class="fa fa-info-circle"></i>{{ trans('admin.likes') }}</a></li>
            <li class=""><a href="{{ aurl('likes/create') }}"><i class="fa fa-plus"></i>{{ trans('admin.add') }}</a></li>
          </ul>
        </li>
 --}}
        <li class="treeview {{ active_menu('products')[0] }}">
          <a href="#">
            <i class="fa fa-info-circle"></i> <span>{{ trans('admin.products') }}</span>
            <span class="pull-right-container">
            </span>
          </a>
          <ul class="treeview-menu" style="{{ active_menu('products')[1] }}">
            <li class=""><a href="{{ aurl('products') }}"><i class="fa fa-info-circle"></i>{{ trans('admin.products') }}</a></li>
          </ul>
        </li>
        

        <li class="treeview {{ active_menu('roles')[0] }}">
          <a href="#">
            <i class="fa fa-info-circle"></i> <span>{{ trans('admin.roles') }}</span>
            <span class="pull-right-container">
            </span>
          </a>
          <ul class="treeview-menu" style="{{ active_menu('roles')[1] }}">
            <li class=""><a href="{{ aurl('adminss') }}"><i class="fa fa-info-circle"></i>{{ trans('admin.roles') }}</a></li>
          </ul>
        </li>
            
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
