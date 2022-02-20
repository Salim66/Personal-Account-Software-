  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="user-profile treeview">
          <a href="index.html">
			<img src="{{ asset('backend/') }}/images/avatar/7.jpg" alt="user">
              <span>
				<span class="d-block font-weight-600 font-size-16">{{ Auth::user()->name }}</span>
				<span class="email-id">{{ Auth::user()->email }}</span>
			  </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
		  <ul class="treeview-menu">
            <li><a href="javascript:void()"><i class="fa fa-user mr-5"></i>My Profile </a></li>
			<li><a href="{{ route('admin.logout') }}"><i class="fa fa-power-off mr-5"></i>Logout</a></li>
          </ul>
        </li>

        @php
            $prefix = Request::route()->getPrefix();
            $route = Route::current()->getName();
        @endphp

        <li class="{{ ($route == 'dashboard') ? 'active' : '' }}">
            <a style="margin-left: 10px; font-size: 16px;" href="{{ route('dashboard') }}">
              <i class="fa-solid fa-gauge-high"></i>
              <span style="margin-left: 5px">Dashboard</span>
            </a>
        </li>

        <li class="{{ ($route == 'add.main.investment') ? 'active' : '' }}">
            <a style="margin-left: 10px; font-size: 16px;" href="{{ route('add.main.investment') }}">
                <i class="fa-solid fa-circle-dollar-to-slot"></i>
              <span style="margin-left: 5px">Main Investment</span>
            </a>
        </li>

        <li class="{{ ($route == 'add.daily.expense') ? 'active' : '' }}">
            <a style="margin-left: 10px; font-size: 16px;" href="{{ route('add.daily.expense') }}">
                <i class="fa-solid fa-circle-minus"></i>
              <span style="margin-left: 5px">Daily Expense</span>
            </a>
        </li>

        <li class="{{ ($route == 'add.daily.income') ? 'active' : '' }}">
            <a style="margin-left: 10px; font-size: 16px;" href="{{ route('add.daily.income') }}">
                <i class="fa-solid fa-circle-plus"></i>
              <span style="margin-left: 5px">Daily Income</span>
            </a>
        </li>

        <li class="">
            <a style="margin-left: 10px; font-size: 16px;" href="pages/auth_login.html">
                <i class="fa-solid fa-file-lines"></i>
              <span style="margin-left: 5px">Report</span>
            </a>
        </li>

        <li class="{{ ($route == 'add.business.name') ? 'active' : '' }}">
            <a style="margin-left: 10px; font-size: 16px;" href="{{ route('add.business.name') }}">
                <i class="fa-solid fa-briefcase"></i>
              <span style="margin-left: 5px">Add Business Name</span>
            </a>
        </li>



      </ul>
    </section>
  </aside>
