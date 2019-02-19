@include('layout.header')

<main role="main">

    @yield('slider')


    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

            <h1>@yield('title')</h1>

        <hr class="featurette-divider">

            @yield('content')

        <hr class="featurette-divider">

    </div><!-- /.container -->


@include('layout.footer')