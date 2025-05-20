<!-- BEGIN: Main Menu-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true"
    style="left: 0%;direction: ltr;">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item "><a class="navbar-brand" href="#" style="left:0%;">
                    <div class="brand-logo"><img class="logo" src="{{ asset('app-assets/images/logo/logo.png') }}" />
                    </div>
                    <h2 style="left:0%;" class="brand-text mb-0">{{ config('app.name') }}</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i
                        class="bx bx-x d-block d-xl-none font-medium-4 primary"></i><i
                        class="toggle-icon bx bx-disc font-medium-4 d-none d-xl-block primary" data-ticon=""></i></a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation"
            data-icon-style="lines">
            <li class=" navigation-header"><span>Dashboard</span>
            </li>
            <li class=" nav-item"><a href="../../../html/rtl/vertical-menu-template-semi-dark/index.html"><i
                        class="menu-livicon" data-icon="home"></i><span class="menu-title"
                        data-i18n="home">home</span><span
                        class="badge badge-light-danger badge-pill badge-round float-right mr-2"></span></a>
                <ul class="menu-content">
                    <li><a href="{{ route('home_chart') }}">
                            <i class="bx bx-right-arrow-alt"></i><span class="menu-item" data-i18n="all">all</span></a>
                    </li>

                </ul>
            </li>
            <br>
            <li class=" nav-item"><a href="../../../html/rtl/vertical-menu-template-semi-dark/index.html"><i
                        class="menu-livicon" data-icon="bulb"></i><span class="menu-title"
                        data-i18n="problem">problem</span><span
                        class="badge badge-light-danger badge-pill badge-round float-right mr-2"></span></a>

                <ul class="menu-content">
                    <li><a href="{{ route( 'all_problem' )}}"><i class="bx bx-right-arrow-alt"></i><span
                                class="menu-item" data-i18n="all">all</span></a>
                    </li>
                    <li><a href="{{ route( 'add_problem' )}}"><i class="bx bx-right-arrow-alt"></i><span
                                class="menu-item" data-i18n="add">add</span></a>
                    </li>
                    <li><a href="{{ route('all_solve') }}"><i class="bx bx-right-arrow-alt"></i><span class="menu-item"
                                data-i18n="solved problem">solved problem</span></a>
                    </li>
                </ul>
            </li>
            <br>
            <li class=" nav-item"><a href="../../../html/rtl/vertical-menu-template-semi-dark/index.html"><i
                        class="menu-livicon" data-icon="calendar"></i><span class="menu-title"
                        data-i18n="date of race">date
                        of race</span><span
                        class="badge badge-light-danger badge-pill badge-round float-right mr-2"></span></a>
                <ul class="menu-content">
                    <li><a href="{{ route('all_date') }}">
                            <i class="bx bx-right-arrow-alt"></i><span class="menu-item" data-i18n="all">all</span></a>
                    </li>

                </ul>
            </li>
            <br>

            <li class=" nav-item"><a href="../../../html/rtl/vertical-menu-template-semi-dark/index.html"><i
                        class="menu-livicon" data-icon="users"></i><span class="menu-title"
                        data-i18n="Dashboard">Teams</span><span
                        class="badge badge-light-danger badge-pill badge-round float-right mr-2"></span></a>
                <ul class="menu-content">
                    <li><a href={{ route('team') }}><i class="bx bx-right-arrow-alt"></i><span class="menu-item"
                                data-i18n="eCommerce">Show</span></a>
                    </li>

                </ul>
            </li> <br>
            <li class=" nav-item"><a href="../../../html/rtl/vertical-menu-template-semi-dark/index.html"><i
                        class="menu-livicon" data-icon="user"></i><span class="menu-title"
                        data-i18n="Dashboard">Students</span><span
                        class="badge badge-light-danger badge-pill badge-round float-right mr-2"></span></a>
                <ul class="menu-content">
                    <li><a href={{ route('student') }}><i class="bx bx-right-arrow-alt"></i><span class="menu-item"
                                data-i18n="eCommerce">Show</span></a>
                    </li>
                </ul>
            </li> <br>
            <li class=" nav-item"><a href="../../../html/rtl/vertical-menu-template-semi-dark/index.html"><i
                        class="fas fa-user-tie"></i><span class="menu-title" data-i18n="Dashboard">Coaches</span><span
                        class="badge badge-light-danger badge-pill badge-round float-right mr-2"></span></a>
                <ul class="menu-content">
                    <li><a href={{ route('coach') }}><i class="bx bx-right-arrow-alt"></i><span class="menu-item"
                                data-i18n="eCommerce">Show</span></a>
                    </li>
                </ul>
            </li>



        </ul>
    </div>
</div>