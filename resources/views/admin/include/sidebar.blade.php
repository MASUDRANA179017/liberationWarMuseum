<!-- Sidebar -->
<div class="sidebar sidebar-style-2">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="blue">
            <a href="{{route('dashboard')}}" class="logo">
                <img src="{{ asset('storage/' . ($setting->logo_light ?? 'Qbit_Logo_Main.png')) }}" alt="navbar brand" class="navbar-brand" height="35">


            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <!--HRM Portion-->
            <ul class="nav nav-secondary">
                <li class="nav-item {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item {{ Route::currentRouteName() == 'slider.index' ? 'active' : '' }}">
                    <a href="{{ route('slider.index') }}">
                        <i class='bx bx-slider-alt'></i>
                        <p>Slider</p>
                    </a>
                </li>
                <li class="nav-item {{ Route::currentRouteName() == 'keypoint.index' ? 'active' : '' }}">
                    <a href="{{ route('keypoint.index') }}">
                        <i class='bx bx-slider-alt'></i>
                        <p>Keypoint</p>
                    </a>
                </li>
                <li class="nav-item {{ Route::currentRouteName() == 'about-us' ? 'active' : '' }}">
                    <a href="{{ route('about-us') }}">
                        <i class='bx bx-info-circle'></i>
                        <span class="sub-item">About Us</span>
                    </a>
                </li>
                <li class="nav-item {{ Route::currentRouteName() == 'action.index' ? 'active' : '' }}">
                    <a href="{{ route('action.index') }}">
                        <i class='bx bxl-telegram'></i>
                        <p>Call To Action</p>
                    </a>
                </li>
                <li class="nav-item {{ Route::currentRouteName() == 'application.index' ? 'active' : '' }}">
                    <a href="{{ route('application.index') }}">
                        <i class='bx bx-data'></i>
                        <p>Application</p>
                    </a>
                </li>
                <li class="nav-item {{ Route::currentRouteName() == 'counter.index' ? 'active' : '' }}">
                    <a href="{{ route('counter.index') }}">
                        <i class='bx bx-money'></i>
                        <span class="sub-item">Main Counter</span>
                    </a>
                </li>
                <li class="nav-item {{ Route::currentRouteName() == 'why-work.index' ? 'active' : '' }}">
                    <a href="{{ route('why-work.index') }}">
                        <i class='bx bx-spreadsheet'></i>
                        <span class="sub-item">Why Choose ?</span>
                    </a>
                </li>

                {{-- <li class="nav-item {{ Route::currentRouteName() == 'client' ? 'active' : '' }}">
                <a href="{{ route('client') }}">
                    <i class='bx bxs-carousel'></i>
                    <span class="sub-item">Clients</span>
                </a>
                </li> --}}
                <li class="nav-item {{ Request::routeIs('testimonial_main.index', 'testimonial') ? 'active submenu' : '' }}">
                    <a data-bs-toggle="collapse" href="#testimonial">
                        <i class='bx bx-message-alt-edit'></i>
                        <span class="sub-item">Testimonial</span>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ Request::routeIs('testimonial_main.index', 'testimonial') ? 'show' : '' }}" id="testimonial">
                        <ul class="nav nav-collapse">
                            <li class="{{ Route::currentRouteName() == 'testimonial_main.index' ? 'active' : '' }}">
                                <a href="{{ route('testimonial_main.index') }}">
                                    <i class='bx bx-category'></i>
                                    <span class="sub-item">Main Testimonial</span>
                                </a>
                            </li>
                            <li class="{{ Route::currentRouteName() == 'testimonial' ? 'active' : '' }}">
                                <a href="{{ route('testimonial') }}">
                                    <i class='bx bx-list-ul'></i>
                                    <span class="sub-item">Testimonial</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                {{-- <li class="nav-item {{ Route::currentRouteName() == 'testimonial' ? 'active' : '' }}">
                <a href="{{ route('testimonial') }}">
                    <i class='bx bx-message-alt-edit'></i>
                    <span class="sub-item">Testimonial</span>
                </a>
                </li> --}}
                <li class="nav-item {{ Route::currentRouteName() == 'products.index' ? 'active' : '' }}">
                    <a href="{{ route('products.index') }}">
                        <i class='bx bx-cube-alt'></i>
                        <span class="sub-item">Archives & Events</span>
                    </a>
                </li>
                <li class="nav-item {{ Route::currentRouteName() == 'film.index' ? 'active' : '' }}">
                    <a href="{{ route('film.index') }}">
                        <i class='bx bxs-video'></i>
                        <span class="sub-item">Films</span>
                    </a>
                </li>

                {{-- <li class="nav-item {{ Route::currentRouteName() == 'admin.estimations.index' ? 'active' : '' }}">
                    <a href="{{ route('admin.estimations.index') }}">
                        <i class='bx bx-calculator'></i>
                        <span class="sub-item">Estimation</span>
                    </a>
                </li> --}}

                <li class="nav-item {{ Request::routeIs('exhibition.category', 'exhibition.index') ? 'active submenu' : '' }}">
                    <a data-bs-toggle="collapse" href="#exhibitions">
                        <i class='bx bx-briefcase'></i>
                        <span class="sub-item">Exhibitions</span>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ Request::routeIs('exhibition.category', 'exhibition.index') ? 'show' : '' }}" id="exhibitions">
                        <ul class="nav nav-collapse">
                            <li class="{{ Route::currentRouteName() == 'exhibition.index' ? 'active' : '' }}">
                                <a href="{{ route('exhibition.index') }}">
                                    <i class='bx bx-list-ul'></i>
                                    <span class="sub-item">Exhibition</span>
                                </a>
                            </li>
                            <li class="{{ Route::currentRouteName() == 'exhibition.category' ? 'active' : '' }}">
                                <a href="{{ route('exhibition.category') }}">
                                    <i class='bx bx-category'></i>
                                    <span class="sub-item">Category</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item {{ Route::currentRouteName() == 'client' ? 'active' : '' }}">
                    <a href="{{ route('client') }}">
                        <i class='bx bx-buildings'></i>
                        <span class="sub-item">Client</span>
                    </a>
                </li>
                <li class="nav-item {{ Route::currentRouteName() == 'cover-image' ? 'active' : '' }}">
                    <a href="{{ route('cover-image') }}">
                        <i class='bx bx-image'></i>
                        <span class="sub-item">Cover Images</span>
                    </a>
                </li>
                {{--
                <li class="nav-item {{ Route::currentRouteName() == 'contact.messages' ? 'active' : '' }}">
                <a href="{{ route('contact.messages') }}">
                    <i class='bx bx-message-square'></i>
                    <span class="sub-item">Messages</span>
                </a>
                </li>
                --}}
                {{-- <li class="nav-item {{ Request::routeIs('management.body.index', 'member.index') ? 'active submenu' : '' }}">
                    <a data-bs-toggle="collapse" href="#power_house_team">
                        <i class='bx bxs-user-account'></i>
                        <span class="sub-item">Team</span>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ Request::routeIs('management.body.index', 'member.index') ? 'show' : '' }}" id="power_house_team">
                        <ul class="nav nav-collapse">
                            <li class="{{ Route::currentRouteName() == 'management.body.index' ? 'active' : '' }}">
                                <a href="{{ route('management.body.index') }}">
                                    <i class='bx bxs-user-detail'></i>
                                    <span class="sub-item">Management Team</span>
                                </a>
                            </li>
                            <li class="{{ Route::currentRouteName() == 'member.index' ? 'active' : '' }}">
                                <a href="{{ route('member.index') }}">
                                    <i class='bx bxs-user'></i>
                                    <span class="sub-item">Engineer Team</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> --}}


                <li class="nav-item {{ Request::routeIs('faq_main.index', 'faq') ? 'active submenu' : '' }}">
                    <a data-bs-toggle="collapse" href="#faqMenu">
                        <i class='bx bx-help-circle'></i>
                        <span class="sub-item">FAQ</span>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ Request::routeIs('faq_main.index', 'faq') ? 'show' : '' }}" id="faqMenu">
                        <ul class="nav nav-collapse">
                            <li class="{{ Route::currentRouteName() == 'faq_main.index' ? 'active' : '' }}">
                                <a href="{{ route('faq_main.index') }}">
                                    <i class='bx bx-book'></i>
                                    <span class="sub-item">Main FAQ</span>
                                </a>
                            </li>
                            <li class="{{ Route::currentRouteName() == 'faq' ? 'active' : '' }}">
                                <a href="{{ route('faq') }}">
                                    <i class='bx bx-question-mark'></i>
                                    <span class="sub-item">Question & Answer</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="nav-item {{ Request::routeIs('contact.messages.unread', 'contact.messages.read') ? 'active submenu' : '' }}">
                    <a data-bs-toggle="collapse" href="#messagesMenu">
                        <i class='bx bx-message-square'></i>
                        <span class="sub-item">Messages</span>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ Request::routeIs('contact.messages.unread', 'contact.messages.read') ? 'show' : '' }}" id="messagesMenu">
                        <ul class="nav nav-collapse">
                            <li class="{{ Route::currentRouteName() == 'contact.messages.unread' ? 'active' : '' }}">
                                <a href="{{ route('contact.messages.unread') }}">
                                    <i class='bx bx-envelope'></i>
                                    <span class="sub-item">Unread Messages</span>
                                </a>
                            </li>
                            <li class="{{ Route::currentRouteName() == 'contact.messages.read' ? 'active' : '' }}">
                                <a href="{{ route('contact.messages.read') }}">
                                    <i class='bx bx-envelope-open'></i>
                                    <span class="sub-item">Read Messages</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>






                {{-- <li class="nav-item {{ Route::currentRouteName() == 'faq' ? 'active' : '' }}">
                <a href="{{ route('faq') }}">
                    <i class='bx bx-question-mark'></i>
                    <span class="sub-item">FAQs</span>
                </a>
                </li>
                <li class="nav-item {{ Route::currentRouteName() == 'contact' ? 'active' : '' }}">
                    <a href="{{ route('contact') }}">
                        <i class='bx bxs-phone-call'></i>
                        <span class="sub-item">Contact Us</span>
                    </a>
                </li> --}}
                <li class="nav-item {{ Route::currentRouteName() == 'blog.index' ? 'active' : '' }}">
                    <a href="{{ route('blog.index') }}">
                        <i class='bx bxl-blogger'></i>
                        <p>News & Blog</p>
                    </a>
                </li>

                {{-- <li class="nav-item {{ Route::currentRouteName() == 'career.index' ? 'active' : '' }}">
                    <a href="{{ route('career.index') }}">
                        <i class='bx bxs-briefcase'></i>
                        <p>Career Opprotunity</p>
                    </a>
                </li> --}}

                <li class="nav-item submenu {{ Route::is('album.index') ? 'active' : '' }}">
                    <a data-bs-toggle="collapse" href="#gallery">
                        <i class='bx bx-images'></i>
                        <p>Gallery</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ Route::is('album.index') ? 'show' : '' }}" id="gallery">
                        <ul class="nav nav-collapse">
                            <li class="{{ Route::is('album.index') ? 'active' : '' }}"><a href="{{ route('album.index') }}"><span class="sub-item">Album</span></a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item {{ Route::currentRouteName() == 'setting.index' ? 'active' : '' }}">
                    <a href="{{ route('settings.index') }}">

                        <i class='bx bxs-cog'></i>
                        <span class="sub-item">Settings</span>
                    </a>
                </li>
                {{-- @canany(['ShowSideBar User', 'ShowSideBar Role','ShowSideBar Permission'])
                <li
                    class="nav-item {{ Request::routeIs('manageuser.*', 'manageuserrole.*', 'permission.*') ? 'active submenu' : '' }}">
                <a data-bs-toggle="collapse" href="#manageusers">
                    <i class="fas fa-user-shield"></i>
                    <p>User Management</p>
                    <span class="caret"></span>
                </a>
                <div class="collapse {{ Request::routeIs('manageuser.*', 'manageuserrole.*', 'permission.*') ? 'show' : '' }}"
                    id="manageusers">
                    <ul class="nav nav-collapse">
                        @can("ShowSideBar User")
                        <li class="{{ Route::currentRouteName() == 'manageuser.index' ? 'active' : '' }}">
                            <a href="{{route('manageuser.index')}}">
                                <i class="fas fa-users"></i>
                                <span class="sub-item">Users</span>
                            </a>
                        </li>
                        @endcan
                        @can("ShowSideBar Role")
                        <li class="{{ Route::currentRouteName() == 'manageuserrole.index' ? 'active' : '' }}">
                            <a href="{{route('manageuserrole.index')}}">
                                <i class="fas fa-users-cog"></i>
                                <span class="sub-item">Role</span>
                            </a>
                        </li>
                        @endcan
                        @can("ShowSideBar Permission")
                        <li class="{{ Route::currentRouteName() == 'permission.index' ? 'active' : '' }}">
                            <a href="{{route('permission.index')}}">
                                <i class="fas fa-key"></i>
                                <span class="sub-item">Permission</span>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </div>
                </li>
                @endcanany --}}

                @can('ShowSideBar Maintenance')
                <li class="nav-item {{ Route::currentRouteName() == 'maintenance' ? 'active' : '' }}">
                    <a href="{{ route('maintenance') }}">
                        <i class="fas fa-wrench"></i>
                        <p>Maintenance</p>
                    </a>
                </li>
                @endcan
                {{-- <li class="nav-item {{ Route::is('privacy-policy') ? 'active' : '' }}">
                    <a href="{{ route('privacy-policy') }}">
                        <i class='bx bx-shield'></i>
                        <p>Policy and Privacy</p>
                    </a>
                </li> --}}
                {{-- <li class="nav-item {{ Route::is('terms-and-conditions') ? 'active' : '' }}">
                    <a href="{{ route('terms-and-conditions') }}">
                        <i class='bx bx-shield-quarter'></i>
                        <p>Terms and Conditions</p>
                    </a>
                </li> --}}

            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
