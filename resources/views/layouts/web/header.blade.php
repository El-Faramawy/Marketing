<div class=" nav" id="NavBar">
    <div class="container- flex">
        <div class="logo">
            <img src="{{url('Web')}}/assets/imgs/logo-1.png">
        </div>
        <nav>
            <div class="links hiden" id="navBar">
                <div class="logo-2">
                    <img src="{{url('Web')}}/assets/imgs/logo-1.png">
                    <i class="fa-solid fa-xmark" id="closeTheNav"></i>
                </div>
                <ul class="first-ul">
                    <li><a href="{{url('/')}}" id="home"  class="active-link nav-link"> {{__('home')}} </a></li>
                    <li><a href="{{url('about')}}" id="about"  class="nav-link">{{__('about')}} </a></li>
                </ul>
                <div class=" contact">
                    <ul class="second-ul">
                        <li><a href="#" class="nav-link soon"> {{__('coming soon')}} </a></li>
                        @if (!auth()->check() )
                        <li><a href="{{url('login')}}" id="login" class="nav-link"> {{__('login')}}  </a></li>
                        @else
                            <div class="account-links" id="dropdown">
                                <div class="name">
                                    <img src="{{url('Web')}}/assets/imgs/profile.svg" />
                                    <span> {{auth()->user()->name}}</span>
                                </div>

                                <div class="dropdown-items remove-height" id="drop">
                                    <ul>
                                        <li>
                                            <img src="{{url('Web')}}/assets/imgs/account.svg" />
                                            <a href="{{url('edit_profile')}}">{{__('Edit Profile')}}</a>
                                        </li>

                                        <li>
                                            <img height="30px" src="{{url('Web')}}/assets/imgs/logout.svg" />
                                            <a href="{{url('logout')}}">{{__('logout')}}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        @endif
                    </ul>

                    <select class="selectpicker btn-light change_lang" data-width="fit">
                        @if(App::getLocale()=='fr')
                            <option value="{{url('change_language','fr')}}" data-content='<span class="flag-icon flag-icon-fr"></span> France'>France</option>
                            <option value="{{url('change_language','en')}}" class="btn-light" data-content='<span class="flag-icon flag-icon-us"></span> English'>English</option>
                        @else
                            <option value="{{url('change_language','en')}}" class="btn-light" data-content='<span class="flag-icon flag-icon-us"></span> English'>English</option>
                            <option value="{{url('change_language','fr')}}"  data-content='<span class="flag-icon flag-icon-fr"></span> France'>France</option>
                        @endif
                    </select>

                </div>

            </div>

            <div class=" bars" id="openMenue">
                <i class="fa-solid fa-bars"></i>
            </div>
        </nav>

    </div>
</div>
@push('site_js')
    <script>
        $(document).ready(function() {
            $('.nav-link').removeClass('active-link')

            if(location.href === '{{url('about')}}'){
                $('#about').addClass('active-link')
            }else if (location.href === '{{url('login')}}' || location.href === '{{url('sign_up')}}'){
                $('#login').addClass('active-link')
            }else{
                $('#home').addClass('active-link')
            }
            // $('#about').addClass('active-link')

        });
        $(document).on('change','.change_lang',function(){
            location.href = $(this).val()
        })
    </script>
@endpush
