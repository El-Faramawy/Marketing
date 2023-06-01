@extends('layouts.admin.app')
@section('page_title') {{$title}} @endsection
<!-- INTERNAL SELECT2 CSS -->
<link href="{{url('Admin')}}/assets/plugins/select2/select2.min.css" rel="stylesheet"/>

@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{$title}}</h3>
                    <div class="{{app()->getLocale()=='en'?'ml-auto':'mr-auto'}} pageheader-btn">
                        @if(in_array(42,admin()->user()->permission_ids))
                            <a href="#" id="addBtn" class="btn btn-primary btn-icon text-white">
                                            <span>
                                                <i class="fe fe-plus"></i>
                                            </span>{{__('New Trash')}}
                            </a>
                        @endif
                        @if(in_array(40,admin()->user()->permission_ids))
                            <a href="#" id="multiDeleteBtn" class="btn btn-danger btn-icon text-white">
                                            <span>
                                                <i class="fa fa-trash-o"></i>
                                            </span>{{__('delete selected')}}
                            </a>
                        @endif
                    </div>
                </div>

{{--                <div class="mb-3">{!! DNS2D::getBarcodePNG('4445645656', 'QRCODE') !!}</div>--}}
                <div class="row">
                    <div class="col-12 ">
                        <div class="card">
                            <div class="card-status bg-blue br-tr-7 br-tl-7"></div>
                            <div class="card-header">
                                <div class="card-title">{{__('Trash Filter')}}</div>
                                <div class="card-options">
                                    <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i
                                            class="fe fe-chevron-up"></i></a>
                                    <a href="#" class="card-options-remove" data-toggle="card-remove"><i
                                            class="fe fe-x"></i></a>
                                </div>
                            </div>
                            <div class="card-body row">
{{--                                <div class="col-sm-12 col-md-4 mb-4">--}}
{{--                                    <p class="mg-b-20 mg-sm-b-40">Choose Action start and end date</p>--}}
{{--                                    <div class="wd-200 mg-b-30">--}}
{{--                                        <div class="input-group">--}}
{{--                                            <div class="input-group-prepend">--}}
{{--                                                <div class="input-group-text">--}}
{{--                                                    <i class="fa fa-calendar tx-16 lh-0 op-6"></i>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <input class="form-control fc-datepicker trash_filter" id="time_from"  placeholder="Start Date" type="text">--}}
{{--                                            <input class="form-control fc-datepicker trash_filter" id="time_to" placeholder="End Date" type="text">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="col-md-12 col-sm-12 row mb-4">

                                    <div class="col-md-4 col-sm-6">
                                        <p class="mg-b-20 mg-sm-b-40">{{__('electrical power')}} </p>
                                        <div class="wd-200 mg-b-30">
                                            <div class="input-group">
                                                <select class="form-control select2 custom-select trash_filter"
                                                        id="power" data-placeholder="{{__('electrical power Condition')}} ... ">
                                                    <option label=" {{__('electrical power Condition')}} ... "></option>
                                                    <option value="all">{{__('All')}}</option>
                                                    <option value="1">{{__('On')}}</option>
                                                    <option value="0">{{__('Off')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <p class="mg-b-20 mg-sm-b-40">{{__('Limit switch')}} </p>
                                        <div class="wd-200 mg-b-30">
                                            <div class="input-group">
                                                <select class="form-control select2 custom-select trash_filter"
                                                        id="trash_door" data-placeholder="{{__('Limit switch Condition')}} ... ">
                                                    <option label="{{__('Limit switch Condition')}} ... "></option>
                                                    <option value="all">{{__('All')}}</option>
                                                    <option value="1">{{__('On')}}</option>
                                                    <option value="0">{{__('Off')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <p class="mg-b-20 mg-sm-b-40">{{__('Motor Over load')}} </p>
                                        <div class="wd-200 mg-b-30">
                                            <div class="input-group">
                                                <select class="form-control select2 custom-select trash_filter"
                                                        id="motor_over_load"
                                                        data-placeholder="{{__('Motor Over load Condition')}} ... ">
                                                    <option label="{{__('Motor Over load Condition')}} ... "></option>
                                                    <option value="all">{{__('All')}}</option>
                                                    <option value="1">{{__('On')}}</option>
                                                    <option value="0">{{__('Off')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="col-md-4  col-sm-6">
                                        <p class="mg-b-20 mg-sm-b-40">{{__('Choose system status')}} </p>
                                        <div class="wd-200 mg-b-30">
                                            <div class="input-group">
                                                <select class="form-control select2 custom-select trash_filter"
                                                        id="system_status" data-placeholder="{{__('Select status')}} ... ">
                                                    <option label=" {{__('Select status')}} ... "></option>
                                                    <option value="all">{{__('All')}}</option>
                                                    <option value="good">{{__('Good')}}</option>
                                                    <option value="fault">{{__('Fault')}}</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-4  col-sm-6">
                                    <p class="mg-b-20 mg-sm-b-40">{{__('Select Trash level')}} </p>
                                    <div class="wd-200 mg-b-30">
                                        <div class="input-group">
                                            <select class="form-control select2 custom-select trash_filter"
                                                    id="trash_status" data-placeholder="{{__('Trash level')}} ... ">
                                                <option label=" {{__('Select Trash level')}} ... "></option>
                                                <option value="all">{{__('All')}}</option>
                                                <option value="Error">{{__('Error')}}</option>
                                                <option value="empty">{{__('Empty')}}</option>
                                                <option value="partially_full">{{__('Partially Full')}}</option>
                                                <option value="full">{{__('Full')}}</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
{{--                                <div class="col-md-3  col-sm-6">--}}
{{--                                    <p class="mg-b-20 mg-sm-b-40">{{__('Select Tank level')}} </p>--}}
{{--                                    <div class="wd-200 mg-b-30">--}}
{{--                                        <div class="input-group">--}}
{{--                                            <select class="form-control select2 custom-select trash_filter"--}}
{{--                                                    id="tank_level" data-placeholder="{{__('Tank level')}} ... ">--}}
{{--                                                <option label="{{__('Select Tank level')}} ... "></option>--}}
{{--                                                <option value="all">{{__('All')}}</option>--}}
{{--                                                <option value="empty">{{__('Empty')}}</option>--}}
{{--                                                <option value="partially_full">{{__('Partially Full')}}</option>--}}
{{--                                                <option value="full">{{__('Full')}}</option>--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                    <div class="col-md-4  col-sm-6">
                                    <p class="mg-b-20 mg-sm-b-40">{{__('Select Sanitize tank')}} </p>
                                    <div class="wd-200 mg-b-30">
                                        <div class="input-group">
                                            <select class="form-control select2 custom-select trash_filter"
                                                    id="sanitize_tank" data-placeholder="{{__('Sanitize tank')}} ... ">
                                                <option label="{{__('Select Sanitize tank')}} ... "></option>
                                                <option value="all">{{__('All')}}</option>
                                                <option value="Error">{{__('Error')}}</option>
                                                <option value="empty">{{__('Empty')}}</option>
{{--                                                <option value="partially_full">{{__('Partially Full')}}</option>--}}
                                                <option value="full">{{__('Full')}}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div><!-- COL END -->
                    </div>
                </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="exportexample"
                                   class="table table-striped table-responsive-lg  card-table table-vcenter text-nowrap mb-0 table-primary align-items-center mb-0">
                                <thead class="bg-primary text-white">
                                <tr>
                                    <th class="text-white"><input type="checkbox" id="master"></th>
                                    <th class="text-white">#</th>
                                    <th class="text-white">{{__('Code')}}</th>
                                    <th class="text-white">{{__('barcode')}}</th>
                                    <th class="text-white">{{__('Device Name')}}</th>
                                    <th class="text-white">{{__('Dealer Name')}}</th>
                                    <th class="text-white">{{__('Account Name')}}</th>
                                    <th class="text-white">{{__('Last update')}}</th>
                                    <th class="text-white">{{__('Location')}}</th>
                                    <th class="text-white">{{__('System Status')}}</th>
                                    <th class="text-white">{{__('Subscription')}}</th>

                                    <th class="text-white">{{__('Details')}}</th>
                                    <th class="text-white">{{__('control')}}</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>

                            </table>


                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="Modal" tabindex="-1" aria-hidden="true">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered modal-lg mw-650px">
                <!--begin::Modal content-->
                <div class="modal-content" id="modalContent">
                    <!--begin::Modal header-->
                    <div class="modal-header">
                        <!--begin::Modal title-->
                        <h2>{{$title}}</h2>
                        <!--end::Modal title-->
                        <!--begin::Close-->
                        <div class="btn btn-sm btn-icon btn-active-color-primary" style="cursor: pointer"
                             data-dismiss="modal" aria-label="Close">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                            <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                      transform="rotate(-45 6 17.3137)"
                                      fill="black"/>
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                      fill="black"/>
                            </svg>
                        </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Close-->
                    </div>
                    <!--begin::Modal body-->
                    <div class="modal-body scroll-y mx-5 mx-xl-15 my-3" id="form-load">

                    </div>
                    <!--end::Modal body-->
                    <div class="modal-footer">
                        <div class=" ">
                            <input form="form" value="{{__('save')}}" type="submit" id="submit" class="btn btn-primary "
                                   style="width: 100px">
                            {{--                                                    <span class="indicator-label ">Save</span>--}}

                        </div>
                        <div class=" ">
                            <button type="reset" data-dismiss="modal" class="btn btn-light me-3 " style="width: 100px">
                                {{__('close')}}
                            </button>
                        </div>
                    </div>
                </div>

                <!--end::Modal content-->
            </div>
            <!--end::Modal dialog-->
        </div>

        @endsection
        @push('admin_js')

            <script>
                var columns = [
                    {data: 'checkbox', name: 'checkbox', orderable: false, searchable: false},
                    {data: 'id', name: 'id'},
                    {data: 'code', name: 'code'},
                    {data: 'barcode', name: 'barcode'},
                    {data: 'device_name', name: 'device_name'},
                    {data: 'dealer_name', name: 'dealer_name'},
                    {data: 'account_name', name: 'account_name'},
                    {data: 'last_update', name: 'last_update'},
                    {data: 'location', name: 'location'},
                    {data: 'status', name: 'status'},
                    {data: 'subscription', name: 'subscription'},
                    {data: 'details', name: 'details'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ];

            </script>
            @include('layouts.admin.inc.ajax',['url'=>'trashes'])



            <script>
                function reload_table() {
                    // var order_from = $('#order_from').val();
                    // var order_to = $('#order_to').val();
                    var power = $('#power').val();
                    var trash_door = $('#trash_door').val();
                    var motor_over_load = $('#motor_over_load').val();
                    var system_status = $('#system_status').val();
                    var trash_status = $('#trash_status').val();
                    // var tank_level = $('#tank_level').val();
                    var sanitize_tank = $('#sanitize_tank').val();
                    var url = '';
                        if ('{{$title}}'== '{{__('Trashes')}}'){
                            url = window.location.href + "?power=" + power + "&trash_door=" + trash_door + "&motor_over_load=" + motor_over_load + "&system_status="
                        + system_status + "&trash_status=" + trash_status + /*"&tank_level=" + tank_level +*/ "&sanitize_tank=" + sanitize_tank;
                        }else{
                            if (system_status == '')
                                url = window.location.href + "&power=" + power + "&trash_door=" + trash_door + "&motor_over_load=" + motor_over_load + "&system_status="
                                    + system_status + "&trash_status=" + trash_status + /*"&tank_level=" + tank_level +*/ "&sanitize_tank=" + sanitize_tank;
                            else
                                url = window.location.href + "&power=" + power + "&trash_door=" + trash_door + "&motor_over_load=" + motor_over_load + "&system_status="
                                    + trash_status + /*"&tank_level=" + tank_level +*/ "&sanitize_tank=" + sanitize_tank;

                        }


                    // alert(url);
                    $('#exportexample').DataTable().ajax.url(url).draw();
                }


                $(document).on('change', '.trash_filter', function () {
                    reload_table()
                })
            </script>

            <!-- INTERNAL BOOTSTRAP-DATERANGEPICKER JS -->
            <script src="{{url('Admin')}}/assets/plugins/bootstrap-daterangepicker/moment.min.js"></script>
            <script src="{{url('Admin')}}/assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

            <!-- INTERNAL  TIMEPICKER JS -->
            <script src="{{url('Admin')}}/assets/plugins/time-picker/jquery.timepicker.js"></script>
            <script src="{{url('Admin')}}/assets/plugins/time-picker/toggles.min.js"></script>

            <!-- INTERNAL DATEPICKER JS-->
            <script src="{{url('Admin')}}/assets/plugins/date-picker/spectrum.js"></script>
            <script src="{{url('Admin')}}/assets/plugins/date-picker/jquery-ui.js"></script>
            <script src="{{url('Admin')}}/assets/plugins/input-mask/jquery.maskedinput.js"></script>

            <!--INTERNAL  FORMELEMENTS JS -->
            <script src="{{url('Admin')}}/assets/js/form-elements.js"></script>
            <script src="{{url('Admin')}}/assets/js/select2.js"></script>

            <!-- INTERNAL SELECT2 JS -->
            <script src="{{url('Admin')}}/assets/plugins/select2/select2.full.min.js"></script>

            <script>
                $(document).ready(function () {
                    $('.card-options-collapse').click();
                })
            </script>

    @endpush
