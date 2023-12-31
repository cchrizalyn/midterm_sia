<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
                <div class="sidebar-brand-text mx-3">{{ __('Homepage') }}</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.dashboard')}}">
                    <span>{{ __('Dashboard') }}</span>
                </a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <span>{{ __('User Management') }}</span>
                </a>
                {{-- <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}" href="{{ route('admin.permissions.index') }}"> <i class="fa fa-briefcase mr-2"></i> {{ __('Permissions') }}</a>
                        <a class="collapse-item {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}" href="{{ route('admin.roles.index') }}"><i class="fa fa-briefcase mr-2"></i> {{ __('Roles') }}</a>
                        <a class="collapse-item {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}"> <i class="fa fa-user mr-2"></i> {{ __('Users') }}</a>
                    </div>
                </div> --}}
            </li>

            <li class="nav-item">
                <a class="nav-link" href="">
                    <span>{{ __('Schedule Today') }}</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span>{{ __('Appointment List') }}</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span>{{ __('Service') }}</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span>{{ __('Treatment') }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span>{{ __('Patient List') }}</span>
                </a>
            </li>
            {{-- inventory --}}
            <li class="nav-item">
                <a class="nav-link" href="
                {{route('admin.inventory')}}">
                    <span>{{ __('Inventory Management') }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="
                {{route('admin.inventory.filter')}}">
                    <span>{{ __('Report Generation') }}</span>
                </a>
            </li>
          
            
            <!-- services -->
            {{-- <li class="nav-item {{ request()->is('admin/services') || request()->is('admin/services') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.services.index') }}">
                <i class="fas fa-cogs"></i>
                    <span>{{ __('Services') }}</span></a>
            </li> --}}

            <!-- employees -->
            {{-- <li class="nav-item {{ request()->is('admin/employees') || request()->is('admin/employees') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.employees.index') }}">
                <i class="fas fa-cogs"></i>
                    <span>{{ __('Employees') }}</span></a>
            </li>

            <!-- clients -->
            <li class="nav-item {{ request()->is('admin/clients') || request()->is('admin/clients') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.clients.index') }}">
                <i class="fas fa-cogs"></i>
                    <span>{{ __('Clients') }}</span></a>
            </li>

            <!-- appointments -->
            
            

            <!-- calendar -->
            <li class="nav-item {{ request()->is('admin/calendar') || request()->is('admin/calendar') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.calendar') }}">
                    <i class="fas fa-fw fa-calendar"></i>
                    <span>{{ __('Calendar') }}</span></a>
            </li> --}}
         

        </ul>