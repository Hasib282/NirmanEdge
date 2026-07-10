<aside id="mySidenav" class="sidenav">
    <!-- Sidebar menue starts -->
    <ul class="sidebar-menu">
        <li class="menu-item" data-url="">
            <div class="menu-title {{ Request::segment(1) == 'admin' ? 'active':''}}">
                <p>
                    <i class="fa-solid fa-house"></i>
                    User List
                </p>
            </div>
        </li>

        <li class="menu-item">
            <div class="menu-title {{ Request::segment(1) == 'admin' ? 'active':''}}">
                <p>
                    <i class="fa-solid fa-house"></i>
                    ADMINISTRATOR
                </p>
                <i class="fas fa-angle-right {{ Request::segment(1) == 'admin' ? 'rotate':''}}"></i>
            </div>
            <ul class="sub-menu {{ Request::segment(1) == 'admin' ? 'show':''}}">
                {{-- Company Menu --}}
                <li class="sub-menu-item">
                    <div class="menu-title {{ (Request::segment(1) == 'admin' && (Request::segment(2) == 'companytype' || Request::segment(2) == 'companies')) ? 'active' : '' }}">
                        <p>
                            <i class="fa-solid fa-building"></i>
                            Company
                        </p>
                        <i class="fas fa-angle-right {{ (Request::segment(1) == 'admin' && (Request::segment(2) == 'companytype' || Request::segment(2) == 'companies')) ? 'rotate' : '' }}"></i>
                    </div>
                    <ul class="sub-menu1 {{ (Request::segment(1) == 'admin' && (Request::segment(2) == 'companytype' || Request::segment(2) == 'companies')) ? 'show':''}}">
                        <li class="sub-menu1-item" data-url="">
                            <div class="menu-title {{ (Request::segment(1) == 'admin' && Request::segment(2) == 'companytype') ? 'active':''}}">
                                <p>
                                    <i class="fa-solid fa-house-circle-exclamation"></i>
                                    Types
                                </p>
                            </div>
                        </li>

                        <li class="sub-menu1-item" data-url="">
                            <div class="menu-title {{ (Request::segment(1) == 'admin' && Request::segment(2) == 'companies') ? 'active':''}}">
                                <p>
                                    <i class="fa-solid fa-house-user"></i>
                                    Details
                                </p>
                            </div>
                        </li>
                    </ul>
                </li>

                {{-- Users Menu --}}
                <li class="sub-menu-item">
                    <div class="menu-title {{ (Request::segment(1) == 'admin' && Request::segment(2) == 'users') ? 'active':''}}">
                        <p>
                            <i class="fa-solid fa-users"></i>
                            Users
                        </p>
                        <i class="fas fa-angle-right {{ (Request::segment(1) == 'admin' && Request::segment(2) == 'users') ? 'rotate':''}}"></i>
                    </div>
                    <ul class="sub-menu1 {{ (Request::segment(1) == 'admin' && Request::segment(2) == 'users') ? 'show':''}}">
                        <li class="sub-menu1-item" data-url="">
                            <div class="menu-title  {{ (Request::segment(1) == 'admin' && Request::segment(2) == 'users' && Request::segment(3) == 'roles') ? 'active':''}}">
                                <p>
                                    <i class="fa-solid fa-dice-six"></i>
                                    Roles
                                </p>
                            </div>
                        </li>
                    
                        <li class="sub-menu1-item" data-url="">
                            <div class="menu-title {{ (Request::segment(1) == 'admin' && Request::segment(2) == 'users' && Request::segment(3) == 'superadmins') ? 'active':''}}">
                                <p>
                                    <i class="fa-solid fa-user-secret"></i>
                                    Super Admin
                                </p>
                            </div>
                        </li>
                        
                        <li class="sub-menu1-item" data-url="">
                            <div class="menu-title {{ (Request::segment(1) == 'admin' && Request::segment(2) == 'users' && Request::segment(3) == 'admins') ? 'active':''}}">
                                <p>
                                    <i class="fa-solid fa-user-tie"></i>
                                    Admin 
                                </p>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
</aside>