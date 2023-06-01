<!doctype html>
<html lang="{{app()->getLocale()}}" dir="{{app()->getLocale()=='ar'?'rtl':'ltr'}}">

<head>

    @include('layouts.admin.css')

</head>

<body class="app sidebar-mini" style="direction:{{app()->getLocale()=='ar'?'rtl':'ltr'}}; ">


<!-- GLOBAL-LOADER -->
<div id="global-loader" style="background-color: transparent!important;">
    <img src="{{url('Admin')}}/assets/images/loader.svg" class="loader-img" alt="Loader" >
</div>
<!-- /GLOBAL-LOADER -->

<!-- PAGE -->
<div class="page">
    <div class="page-main">

    @include('layouts.admin.sidebar')
    <!-- Header -->
    @include('layouts.admin.header')

    <!--Content-area open-->
        <div class="app-content">
            <div class="side-app">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <div>
                        <h1 class="page-title">@yield('page_title')</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('home')}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">@yield('page_title')</li>
                        </ol>
                    </div>

                </div>
                <!-- PAGE-HEADER END -->
                @yield('content')

            </div><!-- End Page -->
        </div>
        <!-- CONTAINER END -->
    </div>

    <!-- FOOTER -->
@include('layouts.admin.footer')

<!-- FOOTER END -->
</div>
<!-- BACK-TO-TOP -->
<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

<audio id="myAudio">
    <source src="{{url('Admin/notification.mp3')}}" type="audio/mpeg">
</audio>

@include('layouts.admin.js')



</body>

</html>
