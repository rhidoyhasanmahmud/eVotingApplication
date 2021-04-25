<div id="sidebar" class="sidebar responsive ace-save-state">
    <ul class="nav nav-list">
        <li class="">
            <a href="{{ url('dashboard') }}">
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> Dashboard </span>
            </a>
            @if( $templateUser->is_system_user || in_array('view_users', $templatePermissions) ||  in_array('add_users', $templatePermissions) )
            <li class="">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-user"></i>
                    <span class="menu-text"> Users </span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">
                    @if( $templateUser->is_system_user || in_array('view_users', $templatePermissions))
                        <li class="">
                            <a href="{{ url('users') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Voters List
                            </a>

                            <b class="arrow"></b>
                        </li>
                    @endif
                    @if( $templateUser->is_system_user || in_array('add_users', $templatePermissions))
                        <li class="">
                            <a href="{{ url('users/polling-station-users') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Polling Station List
                            </a>

                            <b class="arrow"></b>
                        </li>
                    @endif
                    @if( $templateUser->is_system_user || in_array('view_polling_station', $templatePermissions))
                        <li class="">
                            <a href="{{ url('users/create') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Add User
                            </a>

                            <b class="arrow"></b>
                        </li>
                    @endif
                </ul>
            </li>
        @endif
            @if( $templateUser->is_system_user || in_array('view_modules', $templatePermissions) ||  in_array('add_modules', $templatePermissions) )
            <li class="">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-cogs"></i>
                    <span class="menu-text"> Modules </span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">
                    @if( $templateUser->is_system_user || in_array('view_modules', $templatePermissions))
                        <li class="">
                            <a href="{{ url('modules') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Modules List
                            </a>

                            <b class="arrow"></b>
                        </li>
                    @endif
                    @if( $templateUser->is_system_user || in_array('add_modules', $templatePermissions))
                        <li class="">
                            <a href="{{ url('modules/create') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Add Module
                            </a>

                            <b class="arrow"></b>
                        </li>
                    @endif
                </ul>
            </li>
        @endif
        @if( $templateUser->is_system_user || in_array('view_permissions', $templatePermissions) ||  in_array('add_permissions', $templatePermissions) )
            <li class="">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-eye-slash"></i>
                    <span class="menu-text"> Permissions </span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">
                    @if( $templateUser->is_system_user || in_array('view_permissions', $templatePermissions))
                        <li class="">
                            <a href="{{ url('permissions') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Permissions List
                            </a>

                            <b class="arrow"></b>
                        </li>
                    @endif
                    @if( $templateUser->is_system_user || in_array('add_permissions', $templatePermissions))
                        <li class="">
                            <a href="{{ url('permissions/create') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Add Permission
                            </a>

                            <b class="arrow"></b>
                        </li>
                    @endif
                </ul>
            </li>
        @endif
        @if( $templateUser->is_system_user || in_array('view_groups', $templatePermissions) ||  in_array('add_groups', $templatePermissions) )
            <li class="">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-users"></i>
                    <span class="menu-text"> Groups </span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">
                    @if( $templateUser->is_system_user || in_array('view_groups', $templatePermissions))
                        <li class="">
                            <a href="{{ url('groups') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Groups List
                            </a>

                            <b class="arrow"></b>
                        </li>
                    @endif
                    @if( $templateUser->is_system_user || in_array('add_groups', $templatePermissions))
                        <li class="">
                            <a href="{{ url('groups/create') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Add Group
                            </a>

                            <b class="arrow"></b>
                        </li>
                    @endif
                </ul>
            </li>
        @endif
        @if( $templateUser->is_system_user || in_array('all_votes', $templatePermissions))
            <li class="">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-bars"></i>
                    <span class="menu-text"> Votes List </span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">
                    @if( $templateUser->is_system_user || in_array('all_votes', $templatePermissions))
                        <li class="">
                            <a href="{{ url('all_votes') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                All Votes (Country Wise)
                            </a>

                            <b class="arrow"></b>
                        </li>
                    @endif
                </ul>
            </li>
        @endif

        @if( $templateUser->is_system_user || in_array('view_votes_result', $templatePermissions) )
            <li class="">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-product-hunt"></i>
                    <span class="menu-text"> Voter Opinions </span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">
                    @if( $templateUser->is_system_user || in_array('view_votes_result', $templatePermissions))
                        <li class="">
                            <a href="{{ url('all_votes_by_country') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Votes and Result
                            </a>

                            <b class="arrow"></b>
                        </li>
                    @endif
                </ul>
            </li>
        @endif

        @if( $templateUser->is_system_user || in_array('view_question', $templatePermissions) ||  in_array('add_question', $templatePermissions) )
            <li class="">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-credit-card"></i>
                    <span class="menu-text"> New Vote </span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">
                    @if( $templateUser->is_system_user || in_array('view_question', $templatePermissions))
                        <li class="">
                            <a href="{{ url('question') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Question List (Votes)
                            </a>

                            <b class="arrow"></b>
                        </li>
                    @endif
                    @if( $templateUser->is_system_user || in_array('add_question', $templatePermissions))
                        <li class="">
                            <a href="{{ url('add_vote') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Add New Questions (Vote)
                            </a>
                            <b class="arrow"></b>
                        </li>
                    @endif
                </ul>
            </li>
        @endif
        </li>
         
    </ul><!-- /.nav-list -->

    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state"
           data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>
</div>
