@include('layout.header')

<main role="main">

    @include('layout.slider')


    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

        <!-- START THE FEATURETTES -->
            <h1>@yield('title')</h1>

            @yield('content')

        <hr class="featurette-divider">

        <!-- /END THE FEATURETTES -->

    </div><!-- /.container -->


    @yield('script')

@include('layout.footer')