<header id="header">
    <div class="container clearfix">
        <div class="logo"><a href="{{route('home')}}"><img alt="" src="images/logo.png"><span>Business HTML Template</span></a></div>
        <div class="header-search">
            <div class="header-search-a"><i class="fa fa-search"></i></div>
            <div class="header-search-form">
                <form method="post">
                    <input type="text" placeholder="Search Words Here">
                </form>
            </div>
        </div>
        <nav class="navigation">
            <ul>
                @include('layouts.menu')
            </ul>
        </nav><!-- End navigation -->
    </div><!-- End container -->
</header><!-- End header -->
