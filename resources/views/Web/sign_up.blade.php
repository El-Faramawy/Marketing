@extends('layouts.web.app')
@section('site_content')
    <div class="sign-up-form">
        <div class="container-">
            <form class="form-inline" {{--onsubmit="console.log('Done')"--}} action="{{route('users.store')}}" method="post" id="form">
                @csrf
                <div class="si-up-body" id="signUp">
                    <h1>{{__('SIGN UP HERE')}}</h1>
                    <div class="company group-elements">
                        <div>
                            <Label for="com-Name" class="form-label">{{__('company name')}}</Label>
                            <input type="text" id="com-Name" name="name" class="form-control form-control-lg">
                        </div>
                        <div>
                            <Label for="selectActivity" class="form-label">{{__('activity')}}</Label>
                            <select id="selectActivity" name="activity_id" class="form-control form-control-lg">
                                @foreach($activities as $activity)
                                <option value="{{$activity->id}}">{{$activity->name_en}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="company-contact group-elements">
                        <div>
                            <Label for="phone" class="form-label">{{__('phone')}}</Label>
                            <input type="tel" id="phone" name="phone" class="form-control form-control-lg">
                        </div>
                        <div>
                            <Label for="postal" class="form-label">{{__('postal code')}}</Label>
                            <input type="text" id="postal" name="postal_code" class="form-control form-control-lg">
                        </div>
                    </div>
                    <div class="company-address group-elements">
                        <div>
                            <Label for="city" class="form-label">{{__('City')}}</Label>
                            <select name="city_id" id="city_id" class="form-control form-control-lg">
                                @foreach($cities as $city)
                                    <option value="{{$city->id}}">{{$city->name_en}}</option>
                                @endforeach
                            </select>
{{--                            <input type="text" id="city" name="cityName" class="form-control form-control-lg">--}}
                        </div>
                        <div>
                            <Label for="region" class="form-label">{{__('region')}}</Label>
                            <select name="region_id" id="region_id" class="form-control form-control-lg">
{{--                                @foreach($cities as $city)--}}
{{--                                    <option value="{{$city->id}}">{{$city->name_en}}</option>--}}
{{--                                @endforeach--}}
                            </select>
{{--                            <input type="text" id="region" name="regionName" class="form-control form-control-lg">--}}
                        </div>
                        <div class="full-address">
                            <label for="fullAddress" class="form-label">{{__('Address')}}</label>
                            <input type="text" id="fullAddress" name="address" class="form-control form-control-lg">
                        </div>
                    </div>
                    <div class="company-email group-elements">
                        <div>
                            <Label for="email" class="form-label">{{__('E-mail')}}</Label>
                            <input type="email" id="email" name="email" class="form-control form-control-lg">
                        </div>
                        <div>
                            <Label for="verEmail" class="form-label">{{__('confirm E-mail')}}</Label>
                            <input type="email" id="verEmail" name="verEmail" class="form-control form-control-lg">
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
                                <option value="{{$price->id}}">{{$price->price}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="button" class="submit-btn" id="next">{{__('NEXT')}}</button>
                    <div class="text-center">
                        <p>{{__('Already have an account?')}} <a href="{{url('login')}}" class="reg-and-s-in">{{__('login')}}</a></p>
                        <p>{{__('or sign up with:')}}</p>
                        <div class="s-in-btns">
                        <button type="button" href="{{route('login.facebook')}}" class="btn-primary socialBtn">
                            <i class="fab fa-facebook-f"></i> Facebook
                        </button>
                        <button type="button" href="{{route('login.google')}}" class="btn-danger socialBtn">
                            <i class="fab fa-google"></i> google
                        </button>
                        </div>
                    </div>
                </div>
                <div class="form-body" id="creditCard">
                    <h1>{{__('Credit Card')}} </h1>
                    <div class="Card">
                      <label for="Num">{{__('Card Number')}}</label>
                      <!-- Card Number -->
                      <input type="text" id="Num" class="card-number" placeholder="{{__('Card Number')}}" name="card_number"/>
                    </div>
                    <h3>{{__('Expiration date:')}} </h3>
                    <!-- Date Field -->
                    <div class="date-field">

                      <div class="month">
                        <label for="Month" class="MM">{{__('Month')}}</label>
                        <select  id="Month" name="month">
                          <option value="january">January</option>
                          <option value="february">February</option>
                          <option value="march">March</option>
                          <option value="april">April</option>
                          <option value="may">May</option>
                          <option value="june">June</option>
                          <option value="july">July</option>
                          <option value="august">August</option>
                          <option value="september">September</option>
                          <option value="october">October</option>
                          <option value="november">November</option>
                          <option value="december">December</option>
                        </select>
                      </div>
                      <div class="year">
                        <label for="Year">{{__('Year')}}</label>

                        <select id="Year" name="year">
                          <option value="2016">2016</option>
                          <option value="2017">2017</option>
                          <option value="2018">2018</option>
                          <option value="2019">2019</option>
                          <option value="2020">2020</option>
                          <option value="2021">2021</option>
                          <option value="2022">2022</option>
                          <option value="2023">2023</option>
                          <option value="2024">2024</option>
                          <option value="2025">2025</option>
                          <option value="2026">2026</option>
                          <option value="2027">2027</option>
                        </select>
                      </div>
                    </div>

                    <!-- Card Verification Field -->
                    <div class="card-verification">
                      <div class="cvv-input">
                        <label for="CVV">{{__('CVV')}}</label>
                        <input type="text" id="CVV" placeholder="{{__('CVV')}}" name="cvv" />
                        <div class="cvv-details">
                          <p>
                            {{__('3 or 4 digits usually found')}} <br />
                            {{__('on the signature strip')}}
                          </p>
                        </div>
                      </div>
                    </div>

                    <div id="recaptcha-container"></div>

{{--                    <div id="recaptcha-container"></div>--}}
                    <!-- Buttons -->
                    <button type="button" class="proceed-btn" id="previous">
                        {{__('previous')}}
                    </button>
                    <button type="submit" class="active proceed-btn" onclick="/*phoneSendAuth()*//*openModal()*/">
                        {{__('Confirm')}}
                    </button>
                </div>
            </form>
            <div class="modal fade" tabindex="-1" role="dialog" id="myModal">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <form>
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="width: fit-content; background-color: inherit; color: black;"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Verify your phone</h4>
                        </div>

                        <div class="modal-body">
                            <p>We have sent your account verification code. Please check your phone and type the six digits, then click Confirm</p>
                            <input type="text" class="form-control-lg" name="ver-code" placeholder="XXXXXX" maxlength="6">
                        </div>
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary">
                        </div>
                    </form>

                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

        </div>

    </div>
@endsection
@push('site_js')
    <script>
        $(document).on('change','#city_id', function (e){
            e.preventDefault()
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

    <script>
        $(document).on('click','.socialBtn', function (e){
            e.preventDefault()
            location.href = this.getAttribute('href')
        })
    </script>

{{--    <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>--}}

{{--    <script type="text/javascript">--}}
{{--        $(document).on('submit',"form#register_form",function (e) {--}}
{{--            e.preventDefault();--}}

{{--            var formData = new FormData(this);--}}


{{--            $.ajax({--}}
{{--                url: "{{route('user_validation')}}",--}}
{{--                type: 'POST',--}}
{{--                data: formData,--}}
{{--                // beforeSend: function () {--}}
{{--                //     $('#global-loader').show()--}}
{{--                // },--}}
{{--                success: function (data) {--}}

{{--                    window.setTimeout(function () {--}}
{{--                        // $('#global-loader').hide()--}}
{{--                        // $('#submit').attr('disabled', false);--}}
{{--                        if (data.success === 'true') {--}}
{{--                            $('#myModal').modal('show');--}}

{{--                            var firebaseConfig = {--}}
{{--                                apiKey: "AIzaSyA-gj4Cje-NjRUtysAFaNZDdR7VKfdkLL0",--}}
{{--                                authDomain: "famous-5f5fc.firebaseapp.com",--}}
{{--                                projectId: "famous-5f5fc",--}}
{{--                                storageBucket: "famous-5f5fc.appspot.com",--}}
{{--                                messagingSenderId: "1084986292087",--}}
{{--                                appId: "1:1084986292087:web:ed81a7aae062168bd81372",--}}
{{--                                measurementId: "G-6D6NPKZ5Z6"--}}
{{--                            };--}}

{{--                            // Initialize Firebase--}}
{{--                            firebase.initializeApp(firebaseConfig);--}}
{{--                            // firebase.analytics();--}}
{{--                            // window.onload=function () {--}}
{{--                                phoneSendAuth()--}}
{{--                                // render();--}}
{{--                            // };--}}

{{--                            // function render() {--}}
{{--                            //     window.recaptchaVerifier=new firebase.auth.RecaptchaVerifier('recaptcha-container');--}}
{{--                            //     recaptchaVerifier.render();--}}
{{--                            // }--}}
{{--                            // phoneSendAuth()--}}

{{--                        }else {--}}
{{--                            alert(1)--}}
{{--                            var messages = Object.values(data.messages);--}}
{{--                            $( messages ).each(function(index, message ) {--}}
{{--                                my_toaster(message,'error')--}}
{{--                            });--}}
{{--                        }--}}
{{--                    }, 100);--}}

{{--                },--}}
{{--                error: function (data) {--}}
{{--                    $('#global-loader').hide()--}}
{{--                    $('#form-load > .linear-background').hide(loader)--}}
{{--                    $('#submit').html('حفظ').attr('disabled', false);--}}
{{--                    $('#form').show()--}}
{{--                    console.log(data)--}}
{{--                    if (data.status === 500) {--}}
{{--                        my_toaster('هناك خطأ ما','error')--}}
{{--                    }--}}

{{--                    if (data.status === 422) {--}}
{{--                        var errors = $.parseJSON(data.responseText);--}}

{{--                        $.each(errors, function (key, value) {--}}
{{--                            if ($.isPlainObject(value)) {--}}
{{--                                $.each(value, function (key, value) {--}}
{{--                                    my_toaster(value,'error')--}}
{{--                                });--}}

{{--                            }--}}
{{--                        });--}}
{{--                    }--}}
{{--                    if (data.status == 421){--}}
{{--                        my_toaster(data.message,'error')--}}
{{--                    }--}}

{{--                },//end error method--}}

{{--                cache: false,--}}
{{--                contentType: false,--}}
{{--                processData: false--}}
{{--            });--}}


{{--        });--}}


{{--        function phoneSendAuth() {--}}

{{--            var number = '+20'+$("#phone").val();--}}
{{--            // var number = '+1'+$("#phone").val();--}}
{{--            // alert(number)--}}

{{--            firebase.auth().signInWithPhoneNumber(number,window.recaptchaVerifier).then(function (confirmationResult) {--}}

{{--                window.confirmationResult=confirmationResult;--}}
{{--                coderesult=confirmationResult;--}}
{{--                // alert(coderesult);--}}

{{--                // $("#sentSuccess").text("Message Sent Successfully.");--}}
{{--                // $("#sentSuccess").show();--}}
{{--                my_toaster("code sent to your phone")--}}

{{--            }).catch(function (error) {--}}
{{--                // $("#error").text(error.message);--}}
{{--                // $("#error").show();--}}
{{--                my_toaster("code sent to your phone","error")--}}

{{--            });--}}

{{--        }--}}

{{--        function codeverify() {--}}

{{--            var code = $("#verificationCode").val();--}}

{{--            coderesult.confirm(code).then(function (result) {--}}
{{--                var user=result.user;--}}

{{--                $('#myModal').modal('hide');--}}

{{--                var formData = new FormData("#form");--}}

{{--                var url = $(this).attr('action');--}}
{{--                // alert(url)--}}
{{--                $.ajax({--}}
{{--                    url: url,--}}
{{--                    type: 'POST',--}}
{{--                    data: formData,--}}
{{--                    beforeSend: function () {--}}
{{--                        $('#global-loader').show()--}}
{{--                    },--}}
{{--                    success: function (data) {--}}

{{--                        window.setTimeout(function () {--}}
{{--                            $('#global-loader').hide()--}}
{{--                            $('#submit').attr('disabled', false);--}}
{{--                            if (data.success === 'true') {--}}
{{--                                $('#Modal').modal('hide')--}}
{{--                                $('#form')[0].reset();--}}
{{--                                if (data.url) {--}}
{{--                                    window.setTimeout(function () {--}}
{{--                                        location.href = data.url;--}}
{{--                                    }, 1000);--}}
{{--                                }--}}
{{--                                if (data.message) {--}}
{{--                                    my_toaster(data.message)--}}
{{--                                }--}}

{{--                            }else {--}}
{{--                                var messages = Object.values(data.messages);--}}
{{--                                $( messages ).each(function(index, message ) {--}}
{{--                                    my_toaster(message,'error')--}}
{{--                                });--}}
{{--                            }--}}
{{--                        }, 100);--}}

{{--                    },--}}
{{--                    error: function (data) {--}}
{{--                        $('#global-loader').hide()--}}
{{--                        $('#form-load > .linear-background').hide(loader)--}}
{{--                        $('#submit').html('حفظ').attr('disabled', false);--}}
{{--                        $('#form').show()--}}
{{--                        console.log(data)--}}
{{--                        if (data.status === 500) {--}}
{{--                            my_toaster('هناك خطأ ما','error')--}}
{{--                        }--}}

{{--                        if (data.status === 422) {--}}
{{--                            var errors = $.parseJSON(data.responseText);--}}

{{--                            $.each(errors, function (key, value) {--}}
{{--                                if ($.isPlainObject(value)) {--}}
{{--                                    $.each(value, function (key, value) {--}}
{{--                                        my_toaster(value,'error')--}}
{{--                                    });--}}

{{--                                }--}}
{{--                            });--}}
{{--                        }--}}
{{--                        if (data.status == 421){--}}
{{--                            my_toaster(data.message,'error')--}}
{{--                        }--}}

{{--                    },//end error method--}}

{{--                    cache: false,--}}
{{--                    contentType: false,--}}
{{--                    processData: false--}}
{{--                });--}}


{{--            }).catch(function (error) {--}}
{{--                console.log(error)--}}
{{--                my_toaster("error","error");--}}
{{--            });--}}
{{--        }--}}

{{--    </script>--}}
@endpush
