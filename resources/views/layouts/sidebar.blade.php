<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <img src="{{ asset('images/' . Request::segment(2) . '-logo.png') }}" alt="Logo" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="has-sub
                    {{ (Request::segment(1) == 'articles' || Request::segment(1) == 'chart') ? 'active' : '' }}">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-file-alt"></i>Articles &nbsp;&nbsp;&nbsp;<i class="fas fa-caret-down"></i>
                    </a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li {{ Request::segment(1) == 'chart' ? 'class=active' : ''}}>
                            <a href="{{ route('chart', ['company' => Request::segment(2)]) }}">
                                <i class="fas fa-chart-pie"></i>Total
                            </a>
                        </li>
                        <li {{ Request::segment(1) == 'articles' ? (Request::segment(3) == 'positive' ? 'class=active' : '') : '' }}>
                            <a href="{{ route('articles', ['company' => Request::segment(2), 'label' => 'positive']) }}">
                                <i class="fas fa-plus"></i>Positive
                            </a>
                        </li>
                        <li  {{ Request::segment(1) == 'articles' ? (Request::segment(3) == 'negative' ? 'class=active' : '') : '' }}>
                            <a href="{{ route('articles', ['company' => Request::segment(2), 'label' => 'negative']) }}">
                                <i class="fas fa-minus"></i>Negative
                            </a>
                        </li>
                    </ul>
                </li>
                <li {{ Request::segment(1) == 'priceprediction' ? 'class=active' : '' }}>
                    <a href="{{ route('priceprediction', ['company' => Request::segment(2)]) }}">
                        <i class="fas fa-chart-line"></i>Price Prediction
                    </a>
                </li>
                @if ($company != 'sime-darby')
                    <li class="has-sub
                        {{ Request::segment(1) == 'wordscloud' ? 'active' : '' }}
                        ">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-file-alt"></i>Words Cloud &nbsp;&nbsp;&nbsp;<i class="fas fa-caret-down"></i>
                        </a>
                        <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                            <li {{ Request::segment(1) == 'wordscloud' ? (Request::segment(3) == 'positive' ? 'class=active' : '') : '' }}>
                                <a href="{{ route('wordscloud', ['company' => Request::segment(2), 'label' => 'positive']) }}">
                                    <i class="fas fa-plus"></i>Positive
                                </a>
                            </li>
                            <li {{ Request::segment(1) == 'wordscloud' ? (Request::segment(3) == 'negative' ? 'class=active' : '') : '' }}>
                                <a href="{{ route('wordscloud', ['company' => Request::segment(2), 'label' => 'negative']) }}">
                                    <i class="fas fa-minus"></i>Negative
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                <li>
                    <a href="{{ route('landing') }}">
                        <i class="fas fa-arrow-left"></i>Back to list
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->