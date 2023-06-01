{{--@extends('layouts.web.app')--}}
{{--@section('web_content')--}}

{{--@endsection--}}
    <!doctype html>
<html lang="{{app()->getLocale()}}">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{setting()->app_name}}</title>
    <!-- icon -->
    <link rel="icon" href="{{setting()->fav_icon}}" type="image/x-icon">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{url('Web')}}/css/bootstrap-rtl.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="{{url('Web')}}/css/mdb.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{url('Web')}}/css/all.css">
    <!-- swiper -->
    <link rel="stylesheet" href="{{url('Web')}}/css/swiper.css">
    <!-- animate -->
    <link rel="stylesheet" href="{{url('Web')}}/css/aos.css">
    <!-- flag -->
    <link rel="stylesheet" href="{{url('Web')}}/css/flag.min.css">
    <!-- Custom style  -->
    <link rel="stylesheet" href="{{url('Web')}}/css/style.css">
    <!-- fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">

</head>



<body style="direction: {{app()->getLocale()=='ar'?'rtl':'ltr'}}">
<!-- ================ spinner ================= -->
{{--<div class="spinner">--}}
{{--    <img src="{{url('Web')}}/img/fav.png" >--}}
{{--    <div class="loader">--}}
{{--        <span></span>--}}
{{--    </div>--}}
{{--</div>--}}
<!-- ================ spinner ================= -->



<!-- ================ header ================= -->
<div class="topHeader container" id="main_div">
    <div class="row">
        <div class="col">
{{--            <span class=" searchSpan"><i class="fab fa-searchengin"></i></span>--}}
        </div>
        <div class="col justify-content-center">
            <a href="{{url('/')}}"> <img src="{{setting()->logo}}"> </a>
        </div>
        <div class="col"></div>
    </div>
    <span></span>
</div>

<nav class="navbar navbar-expand-lg navbar-light sticky-top py-0 bg-white">
    <div class="container-fluid ">
        <div class="row w-100">
            <div class="col-md-9 col-6 p-0">

                <button style="{{app()->getLocale()=='en'?'float:left':''}}" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#MainNav">
                    <span class="navbar-toggler-icon d-flex justify-content-center align-items-center"> <i
                            class="fas fa-bars text-white"></i></span>
                </button>

                <div class="collapse navbar-collapse" id="MainNav">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0" style="{{app()->getLocale()=='en'?'margin-left: 0 !important;':''}}">

                        <li class="nav-item ">
                            <a class="nav-link" href="#main_div"> <i class="fas fa-home"></i> {{__('home')}} </a>
                        </li>

                        <li class="nav-item ">
                            <a class="nav-link" href="#Footer"> <i class="fas fa-info"></i> {{__('about')}}  </a>
                        </li>

                    </ul>
                </div>

            </div>
            <div class="col-md-3 col-6 nav-item p-0 loginNav ">

                <div class="dropdown d-inline-block ">
                    <!--Trigger-->
                    <a class="nav-link px-1" href="{{route('login')}}"  aria-haspopup="true" aria-expanded="false"><i
                            class="fas fa-user"></i>{{__('login')}}
                    </a>
                    <!--Menu-->
                </div>

                <div class="dropdown d-inline-block ">
                    <!--Trigger-->
                    <a class="nav-link px-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @if(App::getLocale()=='ar')
                            <i class="saudi arabia flag"></i> <span> عربي </span>
                        @else
                            <i class="united states flag"></i> <span> english </span>
                        @endif
                    </a>
                    <!--Menu-->
                    <div class="dropdown-menu">

                        <select class="mdb-select  dropdown-success" id="change_language">
                            <option value="{{url('change_language','ar')}}" {{App::getLocale()=='ar'?'selected':''}}>  عربى </option>
                            <option value="{{url('change_language','en')}}" {{App::getLocale()=='en'?'selected':''}}> english </option>
                        </select>

                    </div>

                </div>


            </div>
        </div>

    </div>
</nav>
<!-- ================ /header ================= -->

<div class=" content" >
    <!-- ================ mainSlider ================= -->
    <section class="main container " style="max-width: 90%!important;">

        <div class="swiper-container main-slider" style="height: 115%;">
            <div class="swiper-wrapper">
                @foreach($sliders as $slider)
                <div class="swiper-slide"><a ><img src="{{$slider->image}}"></a></div>
                @endforeach
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination swiper-pagination-white"></div>
            <!-- Add Arrows -->
            <div class="swiper-button-next swiper-button-white"></div>
            <div class="swiper-button-prev swiper-button-white"></div>
        </div>

    </section>
    <!-- ================ /mainSlider ================= -->

</div>


<!-- ================ Footer ================= -->
<div id="Footer" class="mt-5">
    <footer id="footerPage" style="border-top: 0 white solid;">
        <div class="container">
            <div class="foo-text p-3 mb-3">
                <i class="fas fa-info-circle" style="color:#09bd09"></i>
                <p>
                    من نحن : شركة smart trash شركة رائدة فى مجال الالكترونيات للحاويات الذكية
                    .
                </p>
            </div>
            <div class="foo-text p-3 mb-3">
                <i class="fas fa-comment" style="color:#09bd09"></i>
                <p>
                    رسالتنا : شركة smart trash تهدف لتطور التكنولوجيا و تبدا بالحاويات الذكية
                    .
                </p>
            </div>
            <div class="foo-text p-3 ">
                <i class="fas fa-user-alt-slash" style="color:#09bd09"></i>
                <p>
                    إخلاء المسؤولية: الأسماء
                    والعلامات التجارية المسجلة هي حقوق الطبع
                    والنشر والملكية لأصحابها. يشكل استخدام هذا
                    الموقع قبولاً لشروط الاستخدام وسياسة الخصوصية.
                </p>
            </div>

            <div class="app-popup my-3 d-flex justify-content-center">
                <div class="box py-3 px-4" >
                    <a href="#" class="d-flex" >

                        <div class="logo d-flex align-items-center">
{{--                            <img src="{{setting()->logo}}" height="60px" width="60px" alt="">--}}
                        </div>

                        <div class="text" >
                            <a href="{{route('login')}}" class="h3-h5">
                                <!-- <h3>تطبيق سي جيم للجوال</h3> -->
                                <h5>{{__('login')}}</h5>
                            </a>

                        </div>

                    </a>
                </div>
            </div>

            <div class="social-buttons d-flex justify-content-center">
                <!--Facebook-->
                <a href="https://www.facebook.com/" class="btn-floating btn-md btn-fb" type="button" role="button">
                    <i class="fab fa-facebook-f"></i></a>
                <!--Twitter-->
                <a href="https://www.facebook.com/" class="btn-floating btn-md btn-tw" type="button" role="button">
                    <i class="fab fa-twitter"></i></a>
                <!--Google +-->
                <a href="https://www.facebook.com/" class="btn-floating btn-md btn-gplus" type="button" role="button">
                    <i class="fab fa-youtube"></i></a>
                <!--Instagram-->
                <a href="https://www.facebook.com/" class="btn-floating btn-md btn-ins" type="button" role="button">
                    <i class="fab fa-instagram"></i></a>
                <!--Linkedin-->
                <a href="https://www.facebook.com/" class="btn-floating btn-md btn-li" type="button" role="button"
                   style="background-color: #ee5307 !important;">
                    <i class="fab fa-linkedin-in"></i></a>

            </div>

            <div id="footer_nav_wrp">
                <p class="text-center">{{__('copy_rights')}} ©{{date('Y')}} {{setting()->app_name}}</p>
            </div>
        </div>

    </footer>
</div>
<!-- ================ /Footer ================= -->

<!--////////////////////////////////////////////////////////////////////////////////-->
<!--////////////////////////////////////////////////////////////////////////////////-->
<!--////////////////////////////////////////////////////////////////////////////////-->
<!--/////////////////////////////JavaScript/////////////////////////////////////////-->
<!--////////////////////////////////////////////////////////////////////////////////-->
<!--////////////////////////////////////////////////////////////////////////////////-->
<!--////////////////////////////////////////////////////////////////////////////////-->
<script src="{{url('Web')}}/js/jquery-3.4.1.min.js"></script>
<script src="{{url('Web')}}/js/popper.min.js"></script>
<script src="{{url('Web')}}/js/bootstrap.min.js"></script>
<script src="{{url('Web')}}/js/mdb.min.js"></script>
<script src="{{url('Web')}}/js/smooth-scroll.min.js"></script>
<script src="{{url('Web')}}/js/swiper.js"></script>
<script src="{{url('Web')}}/js/aos.js"></script>
<script src="{{url('Web')}}/js/grade.js"></script>
<script src="{{url('Web')}}/js/flag.min.js"></script>
<script src="{{url('Web')}}/js/Custom.js"></script>
{{--<script>--}}
{{--    $('#Header').load("Header.html");--}}
{{--    $('#Footer').load("Footer.html");--}}
{{--</script>--}}
<script type="text/javascript">
    window.addEventListener('load', function () {
        Grade(document.querySelectorAll('.gradient-wrap'))
    })

    $(document).on('change','#change_language',function (){
        // alert(this.value)
        location.href = this.value
    })
</script>

</body>

</html>
