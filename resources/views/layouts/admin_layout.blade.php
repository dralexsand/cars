<!doctype html>
<html class="fixed sidebar-left-collapsed">
<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <title>Admin Panel</title>
    <meta name="keywords" content="HTML5 Admin Template"/>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

    @include('layouts.parts.lib_header')

</head>
<body>
<section class="body">

    @include('layouts.parts.header')

    <div class="inner-wrapper">

        @include('layouts.parts.sidebar-left')

        <section role="main" class="content-body pb-none">
            @include('layouts.parts.page-header')

            <div id="height_blank" style="height: 300px;width: 100%;"></div>

            @yield('content')

        </section>

    </div>

    @include('layouts.parts.sidebar-right')

</section>

@include('layouts.parts.lib_footer')
</body>
</html>
