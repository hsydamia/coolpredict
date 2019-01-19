@include('layouts.header')

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER DESKTOP-->
        <header class="header-desktop3 d-none d-lg-block">
            <div class="section__content section__content--p35">
                <div class="header3-wrap">
                    <div class="header__logo">
                        <a href="#">
                            <img src="images/icon/logo-white.png" alt="CoolAdmin" />
                        </a>
                    </div>
                </div>
            </div>
        </header>
        <!-- END HEADER DESKTOP-->

        <!-- PAGE CONTENT-->
        <div class="page-content--bgf7">
            <br>

            <!-- WELCOME-->
            <section class="welcome p-t-10">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="title-4">Welcome to Cool Predict!</h1>
                            <hr class="line-seprate">
                        </div>
                    </div>
                </div>
            </section>
            <!-- END WELCOME-->

            <!-- STATISTIC-->
            <section class="statistic statistic2">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--red">
                                <a href="{{ route('index', ['name' => 'cimb']) }}">
                                    <h2 class="number">CIMB</h2>
                                </a><br>
                                <span class="desc">Bank</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-account-o"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--yellow">
                                <a href="{{ route('index', ['name' => 'maybank']) }}">
                                    <h2 class="number">Maybank</h2>
                                </a><br>
                                <span class="desc">Bank</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-shopping-cart"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--blue">
                                <a href="{{ route('index', ['name' => 'axiata']) }}">
                                    <h2 class="number">Axiata</h2>
                                </a><br>
                                <span class="desc">Company</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-calendar-note"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--green">
                                <a href="{{ route('index', ['name' => 'petronas']) }}">
                                    <h2 class="number">Petronas</h2>
                                </a><br>
                                <span class="desc">Company</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-money"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--orange">
                                <a href="{{ route('index', ['name' => 'sime-darby']) }}">
                                    <h2 class="number">Sime Darby</h2>
                                </a><br>
                                <span class="desc">Company</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-money"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END STATISTIC-->
        </div>
    </div>
@include('layouts.footer')