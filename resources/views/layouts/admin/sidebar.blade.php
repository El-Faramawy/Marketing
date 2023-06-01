<?php $setting =  App\Models\Setting::first(); ?>

<!--APP-SIDEBAR-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="side-header">
        <a class="header-brand1" href="{{url('admin/home')}}">
            <img src="{{get_file($setting->logo)}}" class="header-brand-img desktop-logo" alt="logo">
            <img src="{{get_file($setting->logo)}}" class="header-brand-img toggle-logo" alt="logo">
            <img src="{{get_file($setting->logo)}}" class="header-brand-img light-logo" alt="logo">
            <img src="{{get_file($setting->logo)}}" class="header-brand-img light-logo1" alt="logo">
        </a><!-- LOGO -->
    </div>
    <ul class="side-menu">

        <li class="slide">
            <a class="side-menu__item" href="{{url('admin/home')}}">
            <i class="fe fe-home  side-menu__icon"></i>
            <span class="side-menu__label">{{__('home_page')}}</span>
            </a>
        </li>

{{--            @if( in_array(1,admin()->user()->permission_ids))--}}
                <li class="slide">
                    <a class="side-menu__item" href="{{route('admins.index')}}">
                        <i class="fe fe-users  side-menu__icon"></i>
                        <span class="side-menu__label">{{__('Admin')}}</span>
                    </a>
                </li>
                <li class="slide">
                    <a class="side-menu__item" href="{{route('users.index')}}">
                        <i class="fe fe-users  side-menu__icon"></i>
                        <span class="side-menu__label">Users</span>
                    </a>
                </li>
{{--            @endif--}}
        <li class="slide">
            <a class="side-menu__item" href="{{route('prices.index')}}">
                <i class="fe fe-dollar-sign  side-menu__icon"></i>
                <span class="side-menu__label">Prices</span>
            </a>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{route('cities.index')}}">
                <i class="fe fe-menu  side-menu__icon"></i>
                <span class="side-menu__label">Cities</span>
            </a>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{route('regions.index')}}">
                <i class="fe fe-command  side-menu__icon"></i>
                <span class="side-menu__label">Regions</span>
            </a>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{route('activities.index')}}">
                <i class="fe fe-check-circle  side-menu__icon"></i>
                <span class="side-menu__label">Activities</span>
            </a>
        </li>
{{--        @if(in_array(39,admin()->user()->permission_ids))--}}

{{--        @endif--}}

{{--        @if(in_array(22,admin()->user()->permission_ids))--}}
            <li class="slide">
                <a class="side-menu__item" href="{{route('settings.index')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"
                         class="side-menu__icon">
                        <path d="M0 0h24v24H0V0z" fill="none"/>
                        <path
                            d="M12 4c-4.41 0-8 3.59-8 8s3.59 8 8 8 8-3.59 8-8-3.59-8-8-8zm0 12.5c-2.49 0-4.5-2.01-4.5-4.5S9.51 7.5 12 7.5s4.5 2.01 4.5 4.5-2.01 4.5-4.5 4.5z"
                            opacity=".3"/>
                        <path
                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm0-12.5c-2.49 0-4.5 2.01-4.5 4.5s2.01 4.5 4.5 4.5 4.5-2.01 4.5-4.5-2.01-4.5-4.5-4.5zm0 5.5c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1z"/>
                    </svg>
                    <span class="side-menu__label">{{__('Setting')}}</span>
                </a>
            </li>
{{--        @endif--}}
{{--        @if(in_array(81,admin()->user()->permission_ids))--}}

{{--        @endif--}}

    </ul>
</aside>
<!--/APP-SIDEBAR-->
