<aside class="main-sidebar sidebar-dark-blue elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{is_null(Auth::user()->image)?asset('/img/application/profile/undraw_profile_pic_ic5t.svg'):asset(Auth::user()->image->url)}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">{{Auth::user()->name}} {{Auth::user()->last_name}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent nav-legacy" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-header">Admin items</li>
                <li class="nav-item has-treeview ">
                    <a href="{{route('admin.home')}}" class="nav-link {{isActive('admin.home')}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
{{--                            <i class="right fas fa-angle-left"></i>--}}
                        </p>
                    </a>
                </li>

                @canany(['create-user','show-user'])
                    <li class="nav-item has-treeview {{isActive(['admin.user.index'],'menu-open')}}">
                        <a href="#" class="nav-link {{isActive(['admin.user.create', 'admin.user.edit' , 'admin.user.index'])}}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Users
                                <i class="fas fa-angle-left right"></i>
                                {{--                            <span class="badge badge-info right"></span>--}}
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                           @can('show-user')
                                <li class="nav-item">
                                    <a  href="{{route('admin.user.index')}}" class="nav-link {{isActive(['admin.user.create', 'admin.user.edit' , 'admin.user.index'])}}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>User list</p>
                                    </a>
                                </li>
                           @endcan

                            @can('create-user')
                                <li class="nav-item">
                                       <a href="{{route('admin.user.create')}}" class="nav-link">
                                           <i class="far fa-circle nav-icon"></i>
                                           <p>Create User</p>
                                       </a>
                                   </li>
                            @endcan

                        </ul>
                    </li>
                @endcan
                @can('access-comment')
                    <li class="nav-item has-treeview {{isActive(['admin.comment.index', 'admin.comment.unapproved'],'menu-open')}}">
                        <a href="#" class="nav-link {{isActive(['admin.comment.index', 'admin.comment.unapproved'])}}">
                            <i class="nav-icon fas fa-comment"></i>
                            <p>
                                Comments
                                <i class="fas fa-angle-left right"></i>
                                {{--                            <span class="badge badge-info right"></span>--}}
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            {{--                        @can('show-user')--}}
                            <li class="nav-item">
                                <a  href="{{route('admin.comment.index')}}" class="nav-link {{isActive('admin.comment.index')}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Approved Comments</p>
                                </a>
                            </li>
                            {{--                        @endcan--}}

                            {{--                        @can('create-comment')--}}
                            <li class="nav-item">
                                <a href="{{route('admin.comment.unapproved')}}" class="nav-link {{isActive('admin.comment.unapproved')}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Unapproved Comments</p>
                                </a>
                            </li>
                            {{--                        @endcan--}}

                        </ul>
                    </li>
                @endcan
                @canany(['show-roles','show-permissions'])
                    <li class="nav-header">Security</li>
                <li class="nav-item has-treeview {{ isActive(['admin.permission.index','admin.role.index'],'menu-open') }}">
                    <a href="#" class="nav-link {{isActive(['admin.role.index','admin.role.create','admin.role.edit','admin.permission.create', 'admin.permission.edit' , 'admin.permission.index'])}}">
                        <i class="nav-icon fas fa-low-vision"></i>
                        <p>
                            Access permission
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('show-permissions')
                            <li class="nav-item">
                                <a href="{{ route('admin.permission.index')  }}" class="nav-link {{isActive(['admin.permission.create', 'admin.permission.edit' , 'admin.permission.index'])}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Manage permissions</p>
                                </a>
                            </li>
                        @endcan
                        @can('show-roles')
                            <li class="nav-item">
                                <a href="{{ route('admin.role.index') }}" class="nav-link {{ isActive(['admin.role.index','admin.role.create','admin.role.edit']) }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Manage roles</p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
                @endcan
                @can('access-listing')
                <li class="nav-header">Listing</li>
                <li class="nav-item has-treeview {{ isActive(['admin.products.approved','admin.products'],'menu-open') }}">
                    <a href="#" class="nav-link {{isActive(['admin.products.approved','admin.products','admin.product.show'])}}">
                        <i class="nav-icon fas fa-low-vision"></i>
                        <p>
                            Houses
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('show-permissions')
                            <li class="nav-item">
                                <a href="{{ route('admin.products.approved')  }}" class="nav-link {{ isActive(['admin.products.approved','admin.products.show'])}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Manage Approved</p>
                                </a>
                            </li>
                        @endcan
                        @can('show-roles')
                            <li class="nav-item">
                                <a href="{{ route('admin.products') }}" class="nav-link {{ isActive(['admin.products','admin.products.show']) }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Manage Unapproved</p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
                @endcan

                <li class="nav-header">Setting</li>
                <li class="nav-item has-treeview {{isActive(['admin.feature.index','admin.category.index','admin.recommender-action.index'],'menu-open')}}">
                    <a href="#" class="nav-link {{isActive(['admin.feature.index','admin.category.index','admin.recommender-action.index'])}}">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Performance
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.recommender-action.index')}}" class="nav-link {{isActive(['admin.recommender-action.index'])}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Recommander System</p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview {{isActive(['admin.feature.index','admin.category.index'],'menu-open')}}">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon "></i>
                                <p>
                                    Structure
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('admin.feature.index')}}" class="nav-link {{isActive(['admin.feature.index'])}}">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Features</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.category.index')}}" class="nav-link {{isActive(['admin.category.index'])}}">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Category</p>
                                    </a>
                                </li>
{{--                                <li class="nav-item">--}}
{{--                                    <a href="#" class="nav-link">--}}
{{--                                        <i class="far fa-dot-circle nav-icon"></i>--}}
{{--                                        <p>Level 3</p>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a href="#" class="nav-link">--}}
{{--                                        <i class="far fa-dot-circle nav-icon"></i>--}}
{{--                                        <p>Level 3</p>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
