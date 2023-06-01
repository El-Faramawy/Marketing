<!--begin::Form-->
<style>
    .align-items-center.mb-3.mt-3.col-3 {
        margin-top: 20px !important;
    }
</style>
<script src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap" async defer></script>

<script>
    let map;
    function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
            center: { lat: {{$trash->latitude}} , lng: {{$trash->longitude}}  },
            zoom: 8,
            scrollwheel: true,
        });

        const uluru = { lat: {{$trash->latitude}}, lng: {{$trash->longitude}} };
        let marker = new google.maps.Marker({
            position: uluru,
            map: map,
            draggable: true
        });
        google.maps.event.addListener(marker,'position_changed',
            function (){
                let lat = marker.position.lat()
                let lng = marker.position.lng()
                $('#lat').val(lat)
                $('#lng').val(lng)
            })
        google.maps.event.addListener(map,'click',
            function (event){
                pos = event.latLng
                marker.setPosition(pos)
            })
    }
</script>

<link href="{{url('Admin')}}/assets/plugins/select2/select2.min.css" rel="stylesheet"/>
<form id="form" enctype="multipart/form-data" method="POST" action="{{route('trashes.update',$trash->id)}}">
    @csrf
    @method('PUT')
    @csrf
    <div class="row mt-0">
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-md-6 col-sm-12 mt-0">
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required">{{__('Device Name')}} </span>
                <i class="fa fa-asterisk ms-5 text-danger" title="{{__('Device Name')}}"></i>
            </label>
            <input type="text" class="form-control form-control-solid " placeholder="{{__('Device Name')}}" name="device_name" value="{{$trash->device_name}}"/>
        </div>
        <!--end::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-md-6 col-sm-12 mt-0">
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required">{{__('Dealer Name')}} </span>
                {{--                <i class="fa fa-asterisk ms-5 text-danger" title="{{__('Dealer Name')}}"></i>--}}
            </label>
            <input type="text" class="form-control form-control-solid " placeholder="{{__('Dealer Name')}}" name="dealer_name"  value="{{$trash->dealer_name}}"/>
        </div>
        <!--end::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-md-6 col-sm-12 mt-0">
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required">{{__('Account Name')}} </span>
                {{--                <i class="fa fa-asterisk ms-5 text-danger" title="{{__('Account Name')}}"></i>--}}
            </label>
            <input type="text" class="form-control form-control-solid " placeholder="{{__('Account Name')}}" name="account_name"  value="{{$trash->account_name}}"/>
        </div>
        <!--end::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-md-6 col-sm-12 mt-0">
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required">{{__('Code')}} </span>
                <i class="fa fa-asterisk ms-5 text-danger" title="{{__('Code')}}"></i>
            </label>
            <input type="text" class="form-control form-control-solid numbersOnly" placeholder="{{__('Code')}}" name="code"  value="{{$trash->code}}"/>
        </div>
        <!--end::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-sm-12 mt-0">
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required">{{__('Location')}} </span>
                <i class="fa fa-asterisk ms-5 text-danger" title="{{__('Location')}}"></i>
            </label>
            <input type="text" class="form-control form-control-solid " placeholder="{{__('Location')}}" name="location" value="{{$trash->location}}"/>
        </div>
        <!--end::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-sm-12 mt-0">
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required">{{__('Description')}} </span>
                {{--                <i class="fa fa-asterisk ms-5 text-danger" title="{{__('Description')}}"></i>--}}
            </label>
            <textarea class="form-control form-control-solid" placeholder="{{__('Description')}}" name="description" > {{$trash->description}}</textarea>
        </div>
        <!--end::Input group-->
        <div class="row col-12">
            <div class=" mb-2 row col-12 col-lg-6 mt-0 ml-3">
                <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                    <span class="required">{{__('trash_status')}} </span>
                    <i class="fa fa-asterisk ms-5 text-danger" title="{{__('trash_status')}}"></i>
                </label>
                <select name="trash_status" class="form-control form-control-solid select2">
                    <option value=""  disabled> {{__('select_trash_status')}} ...</option>
                    <option value="empty" {{$trash->trash_status == 'empty'?'selected':''}}>{{__('Empty')}} </option>
                    <option value="partially_full" {{$trash->trash_status == 'partially_full'?'selected':''}}>{{__('partially full 70%')}}</option>
                    <option value="full" {{$trash->trash_status == 'full'?'selected':''}}>{{__('full 100%')}}</option>
                </select>
            </div>
            <!--end::Input group-->
{{--            <div class=" mb-2 row col-12 col-lg-6 mt-0 ml-3">--}}
{{--                <label class="d-flex align-items-center fs-6 fw-bold form-label ">--}}
{{--                    <span class="required">{{__('Tank level')}} </span>--}}
{{--                    <i class="fa fa-asterisk ms-5 text-danger" title="{{__('Tank level')}}"></i>--}}
{{--                </label>--}}
{{--                <select name="tank_level" class="form-control form-control-solid select2">--}}
{{--                    <option value=""  disabled> {{__('Select Tank level')}} ...</option>--}}
{{--                    <option {{$trash->tank_level == 'empty'?'selected':''}}  value="empty">{{__('Empty')}} </option>--}}
{{--                    <option {{$trash->tank_level == 'partially_full'?'selected':''}} value="partially_full">{{__('partially full 70%')}}</option>--}}
{{--                    <option {{$trash->tank_level == 'full'?'selected':''}} value="full">{{__('full 100%')}}</option>--}}
{{--                </select>--}}
{{--            </div>--}}
            <!--end::Input group-->
            <div class=" mb-2 row col-12 col-lg-6 mt-0 ml-3 " >
                <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                    <span class="required">{{__('Sanitize tank')}} </span>
                    <i class="fa fa-asterisk ms-5 text-danger" title="{{__('Sanitize tank')}}"></i>
                </label>
                <select name="sanitize_tank" class="form-control form-control-solid select2">
                    <option value=""  disabled> {{__('Select Sanitize tank')}} ...</option>
                    <option {{$trash->sanitize_tank == 'empty'?'selected':''}}  value="empty">{{__('Empty')}} </option>
{{--                    <option {{$trash->sanitize_tank == 'partially_full'?'selected':''}} value="partially_full">{{__('partially full 70%')}}</option>--}}
                    <option {{$trash->sanitize_tank == 'full'?'selected':''}} value="full">{{__('full 100%')}}</option>
                </select>
            </div>
        </div>
        <!--end::Input group-->
        <div class=" mb-2 fv-row col-md-6 col-12 mt-0 row">
            <label class=" align-items-center fs-6 fw-bold form-label col-9">
                <span class="required">{{__('System Status')}}</span>
            </label>
            <div class=" align-items-center mb-3 mt-3 col-3">
                <div class="material-switch pull-left">
                    <input id="someSwitchOptionPrimary" {{$trash->system_status == 'good'?'checked':''}} name="system_status" type="checkbox"/>
                    <label for="someSwitchOptionPrimary" class="label-primary"></label>
                </div>
            </div>
        </div>
        <!--end::Input group-->
        <div class=" mb-2 fv-row col-md-6 col-12 mt-0 row">
            <label class=" align-items-center fs-6 fw-bold form-label col-9">
                <span class="required">{{__('electrical power Condition')}}</span>
            </label>
            <div class=" align-items-center mb-3 mt-3 col-3">
                <div class="material-switch pull-left">
                    <input id="someSwitchOptionPrimary2" {{$trash->power == 1?'checked':''}} name="power" type="checkbox"/>
                    <label for="someSwitchOptionPrimary2" class="label-primary"></label>
                </div>
            </div>
        </div>
        <!--end::Input group-->
        <div class=" mb-2 fv-row col-md-6 col-12  mt-0 row">
            <label class=" align-items-center fs-6 fw-bold form-label col-9">
                <span class="required">{{__('Subscription')}}</span>
            </label>
            <div class=" align-items-center mb-3 mt-3 col-3">
                <div class="material-switch pull-left">
                    <input id="someSwitchOptionPrimary3" {{$trash->subscription == 1?'checked':''}} name="subscription" type="checkbox"/>
                    <label for="someSwitchOptionPrimary3" class="label-primary"></label>
                </div>
            </div>
        </div>
        <!--end::Input group-->
        <div class=" mb-2 fv-row col-md-6 col-12 mt-0 row">
            <label class=" align-items-center fs-6 fw-bold form-label col-9">
                <span class="required">{{__('Limit switch')}} </span>
            </label>
            <div class=" align-items-center mb-3 mt-3 col-3">
                <div class="material-switch pull-left">
                    <input id="someSwitchOptionPrimary4" {{$trash->trash_door == 1?'checked':''}} name="trash_door" type="checkbox"/>
                    <label for="someSwitchOptionPrimary4" class="label-primary"></label>
                </div>
            </div>
        </div>
        <!--end::Input group-->
        <div class=" mb-2 fv-row col-md-6 col-12 mt-0 row">
            <label class=" align-items-center fs-6 fw-bold form-label col-9">
                <span class="required">{{__('Motor Over load')}}</span>
            </label>
            <div class=" align-items-center mb-3 mt-3 col-3">
                <div class="material-switch pull-left">
                    <input id="someSwitchOptionPrimary5" {{$trash->motor_over_load == 1?'checked':''}} name="motor_over_load" type="checkbox"/>
                    <label for="someSwitchOptionPrimary5" class="label-primary"></label>
                </div>
            </div>
        </div>
        <br>

    </div>
    <div class="row" >
        <div class="col-6">
            <input type="text" class="form-control" placeholder="{{__('latitude')}}" name="latitude" id="lat" value="{{$trash->latitude}}">
        </div>
        <div class="col-6">
            <input type="text" class="form-control" placeholder="{{__('longitude')}}" name="longitude" id="lng" value="{{$trash->longitude}}">
        </div>
    </div>
    <div id="map" style="height:400px" class="my-3 col-12"></div>

</form>
<!--end::Form-->
<script src="{{url('Admin')}}/assets/plugins/select2/select2.full.min.js"></script>
<script src="{{url('Admin')}}/assets/js/select2.js"></script>




