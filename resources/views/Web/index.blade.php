@extends('layouts.web.app')
@section('site_content')
    <div class="home-content">
        <div class="container-">
            <div class="home-text">
                <h1>{{__('Experts in E-Marketing and Advertising')}}</h1>
                <p>{{__('home_text')}} </p>
                    <div class="buttons">
                        <a href="{{url('about')}}" class="nav-link soon"> {{__('ABOUT US')}} </a>
                        <a href="{{url('sign_up')}}" class="nav-link soon" style="background-color: rgb(33, 35, 49);"> {{__('Sign up')}} </a>
                    </div>
            </div>
            <div class="home-imge">
                <img src="{{url('Web')}}/assets/imgs/homeimg.jpg">
            </div>

        </div>
    </div>
@endsection
