@extends('layouts.web.app')
@section('site_content')
    <div class="sign-up-form">
        <div class="container-">
            <form action="{{route('users.update')}}" method="post" id="form">
                @csrf
                <div class="si-up-body" id="signUp">
                    <h1>{{__('Edit Profile')}}</h1>
                    <div class="company group-elements">
                        <div>
                            <Label for="com-Name" class="form-label">{{__('company name')}}</Label>
                            <input type="text" value="{{$user->name}}" id="com-Name" name="name" class="form-control form-control-lg">
                        </div>
                        <div>
                            <Label for="selectActivity" class="form-label">{{__('activity')}}</Label>
                            <select id="selectActivity" name="activity_id" class="form-control form-control-lg">
                                @foreach($activities as $activity)
                                    <option {{$user->activity_id == $activity->id?'selected':''}} value="{{$activity->id}}">{{$activity->name_en}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="company-contact group-elements">
                        <div>
                            <Label for="phone" class="form-label">{{__('phone')}}</Label>
                            <input type="tel" id="phone" name="phone" value="{{$user->phone}}" class="form-control form-control-lg">
                        </div>
                        <div>
                            <Label for="postal" class="form-label">{{__('postal code')}}</Label>
                            <input type="text" id="postal" name="postal_code" value="{{$user->postal_code}}" class="form-control form-control-lg">
                        </div>
                    </div>
                    <div class="company-address group-elements">
                        <div>
                            <Label for="city" class="form-label">{{__('City')}}</Label>
                            <select name="city_id" id="city_id" class="form-control form-control-lg">
                                @foreach($cities as $city)
                                    <option {{$user->city_id == $city->id?'selected':''}} value="{{$city->id}}">{{$city->name_en}}</option>
                                @endforeach
                            </select>
                            {{--                            <input type="text" id="city" name="cityName" class="form-control form-control-lg">--}}
                        </div>
                        <div>
                            <Label for="region" class="form-label">{{__('region')}}</Label>
                            <select name="region_id" id="region_id" class="form-control form-control-lg">
                                @foreach($regions as $region)
                                    <option {{$user->region_id == $region->id?'selected':''}} value="{{$region->id}}">{{$region->name_en}}</option>
                                @endforeach
                            </select>
                            {{--                            <input type="text" id="region" name="regionName" class="form-control form-control-lg">--}}
                        </div>
                        <div class="full-address">
                            <label for="fullAddress" class="form-label">{{__('Address')}}</label>
                            <input type="text" id="fullAddress" name="address" value="{{$user->address}}" class="form-control form-control-lg">
                        </div>
                    </div>
                    <div class="company-email group-elements">
                        <div>
                            <Label for="email" class="form-label">{{__('E-mail')}}</Label>
                            <input type="email" id="email" name="email" value="{{$user->email}}" class="form-control form-control-lg">
                        </div>
                        <div>
                            <Label for="verEmail" class="form-label">{{__('confirm E-mail')}}</Label>
                            <input type="email" id="verEmail" name="verEmail" value="{{$user->email}}" class="form-control form-control-lg">
                        </div>
                    </div>
                    <div class="company-password group-elements">
                        <div>
                            <Label for="password" class="form-label">{{__('Password')}}</Label>
                            <input type="password" id="password" name="password" class="form-control form-control-lg">
                        </div>
                        <div>
                            <Label for="verpassword" class="form-label">{{__('confirm password')}}</Label>
                            <input type="password" id="verpassword" name="verPassword" class="form-control form-control-lg">
                        </div>
                    </div>
                    <div class="price group-elements">

                        <Label for="price" class="form-label">{{__('price')}}</Label>
                        <select name="price_id" class="form-control form-control-lg">
                            @foreach($prices as $price)
                                <option {{$user->price_id == $price->id?'selected':''}} value="{{$price->id}}">{{$price->price}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="button" class="submit-btn" id="next">{{__('NEXT')}}</button>
{{--                    <div class="text-center">--}}
{{--                        <p>Already have an account? <a href="sinin.html" class="reg-and-s-in">log in</a></p>--}}
{{--                        <p>or sign up with:</p>--}}
{{--                        <div class="s-in-btns">--}}
{{--                        <button type="button" class="btn-primary">--}}
{{--                            <i class="fab fa-facebook-f"></i> Facebook--}}
{{--                        </button>--}}
{{--                        <button type="button" class="btn-danger">--}}
{{--                            <i class="fab fa-google"></i> google--}}
{{--                        </button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
                <div class="form-body" id="creditCard">
                    <h1>{{__('Credit Card')}} </h1>
                    <div class="Card">
                        <label for="Num">{{__('Card Number')}}</label>
                        <!-- Card Number -->
                        <input type="text" id="Num" class="card-number" placeholder="{{__('Card Number')}}" name="card_number" value="{{$user->card_number}}"/>
                    </div>
                    <h3>{{__('Expiration date:')}} </h3>
                    <!-- Date Field -->
                    <div class="date-field">

                        <div class="month">
                            <label for="Month" class="MM">{{__('Month')}}</label>
                            <select  id="Month" name="month">
                                <option value="january" {{$user->month == 'january'?'selected':''}}>January</option>
                                <option value="february" {{$user->month == 'february'?'selected':''}}>February</option>
                                <option value="march" {{$user->month == 'march'?'selected':''}}>March</option>
                                <option value="april" {{$user->month == 'april'?'selected':''}}>April</option>
                                <option value="may" {{$user->month == 'may'?'selected':''}}>May</option>
                                <option value="june" {{$user->month == 'june'?'selected':''}}>June</option>
                                <option value="july" {{$user->month == 'july'?'selected':''}}>July</option>
                                <option value="august" {{$user->month == 'august'?'selected':''}}>August</option>
                                <option value="september" {{$user->month == 'september'?'selected':''}}>September</option>
                                <option value="october" {{$user->month == 'october'?'selected':''}}>October</option>
                                <option value="november" {{$user->month == 'november'?'selected':''}}>November</option>
                                <option value="december" {{$user->month == 'december'?'selected':''}}>December</option>
                            </select>
                        </div>
                        <div class="year">
                            <label for="Year">{{__('Year')}}</label>

                            <select id="Year" name="year">
                                <option value="2016" {{$user->year=='2016'?'selected':''}} >2016</option>
                                <option value="2017" {{$user->year=='2017'?'selected':''}} >2017</option>
                                <option value="2018" {{$user->year=='2018'?'selected':''}} >2018</option>
                                <option value="2019" {{$user->year=='2019'?'selected':''}} >2019</option>
                                <option value="2020" {{$user->year=='2020'?'selected':''}} >2020</option>
                                <option value="2021" {{$user->year=='2021'?'selected':''}} >2021</option>
                                <option value="2022" {{$user->year=='2022'?'selected':''}} >2022</option>
                                <option value="2023" {{$user->year=='2023'?'selected':''}} >2023</option>
                                <option value="2024" {{$user->year=='2024'?'selected':''}} >2024</option>
                                <option value="2025" {{$user->year=='2025'?'selected':''}} >2025</option>
                                <option value="2026" {{$user->year=='2026'?'selected':''}} >2026</option>
                                <option value="2027" {{$user->year=='2027'?'selected':''}} >2027</option>
                            </select>
                        </div>
                    </div>

                    <!-- Card Verification Field -->
                    <div class="card-verification">
                        <div class="cvv-input">
                            <label for="CVV">{{__('CVV')}}</label>
                            <input type="text" id="CVV" placeholder="{{__('CVV')}}" name="cvv" value="{{$user->cvv}}" />
                            <div class="cvv-details">
                                <p>
                                    {{__('3 or 4 digits usually found')}} <br />
                                    {{__('on the signature strip')}}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <button type="button" class="proceed-btn" id="previous">
                        {{__('previous')}}
                    </button>
                    <button type="submit" class="active proceed-btn">
                        {{__('update')}}
                    </button>
                </div>
            </form>

        </div>

    </div>
@endsection
@push('site_js')
    <script>
        $(document).on('change','#city_id', function (e){
            e.preventDefault()
            // alert('1')
            var city_id = $(this).val();
            $.ajax({
                type: 'GET', //THIS NEEDS TO BE GET
                url: '{{url("get_city_regions")}}?'+'city_id='+city_id,
                success: function (data) {
                    $("#region_id").html(data);
                },
                error: function() {
                    console.log(data);
                }
            });
        })
    </script>
@endpush
