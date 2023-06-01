@extends('layouts.admin.app')
@section('page_title') {{__('Trash Details')}} @endsection
<style>
    canvas#areaChart1 {
        height: 11rem !important;
    }
</style>
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="example">

                    <div class="col-sm-12 ">
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table  mb-3 text-nowrap">
                                        <tbody>
                                            <tr class="row col-12">
                                                <td class="col-md-6 col-sm-12">
                                                    <h6 class="mb-0 font-weight-bold  ml-2 d-inline-block">{{__('Device Name')}} : </h6>
                                                    <span class="m-1 ml-0 d-inline-block">
                                                            {{$trash['device_name']}}
                                                        </span>
                                                </td>
                                                <td class="col-md-6 col-sm-12">
                                                    <h6 class="mb-0 font-weight-bold  ml-2 d-inline-block">{{__('Code')}} : </h6>
                                                    <span class="m-1 ml-0 d-inline-block">
                                                            {{$trash['code']}}
                                                        </span>
                                                </td>
                                            </tr>
                                            <tr class="row col-12">
                                                <td class="col-md-6 col-sm-12">
                                                    <h6 class="mb-0 font-weight-bold  ml-2 d-inline-block">{{__('Dealer Name')}} : </h6>
                                                    <span class="m-1 ml-0 d-inline-block">
                                                        {{$trash['dealer_name']}}
                                                    </span>
                                                </td>
                                                <td class="col-md-6 col-sm-12">
                                                    <h6 class="mb-0 font-weight-bold  ml-2 d-inline-block">{{__('Account Name')}} : </h6>
                                                    <span class="m-1 ml-0 d-inline-block">
                                                        {{$trash['account_name']}}
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr class="row col-12">
                                                <td class="col-md-6 col-sm-12">
                                                    <h6 class="mb-0 font-weight-bold  ml-2 d-inline-block">{{__('System Status')}} : </h6>
                                                    <span class="m-1 ml-0 d-inline-block">
                                                        {{$trash['system_status']=='good' ? __('Good'):__('Fault')}}
                                                    </span>
                                                </td>
                                                <td class="col-md-6 col-sm-12">
                                                    <h6 class="mb-0 font-weight-bold  ml-2 d-inline-block">{{__('Subscription')}} : </h6>
                                                    <span class="m-1 ml-0 d-inline-block">
                                                        {{$trash['subscription']==1? __('Active') : __('Inactive')}}
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr class="row col-12">
                                                <td class="col-md-6 col-sm-12">
                                                    <h6 class="mb-0 font-weight-bold  ml-2 d-inline-block">{{__('creating date')}} : </h6>
                                                    <span class="m-1 ml-0 d-inline-block">
                                                        {{date('Y-m-d', strtotime($trash['created_at'].'+2 hour'))}} &nbsp; {{date('h:i A', strtotime($trash['created_at'].'+2 hour'))}}
                                                    </span>
                                                </td>
                                                <td class="col-md-6 col-sm-12">
                                                    <h6 class="mb-0 font-weight-bold  ml-2 d-inline-block">{{__('Last update')}} : </h6>
                                                    <span class="m-1 ml-0 d-inline-block">
                                                        {{date('Y-m-d', strtotime($last_activity->time .'+2hours'))}} &nbsp; {{date('h:i A', strtotime($last_activity->time))}}
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr class="row col-12">
                                                <td class="col-12">
                                                    <h6 class="mb-0 font-weight-bold  ml-2 d-inline-block">{{__('Description')}} : </h6>
                                                    <span class="m-1 ml-0 d-inline-block">
                                                        {{$trash['description']}}
                                                    </span>
                                                </td>

                                            </tr>
                                            <tr class="row col-12">
                                                <td class="col-12 mb-2">
                                                    <h6 class="mb-0 font-weight-bold  ml-2 d-inline-block">{{__('Location')}} : </h6>
                                                    <span class="m-1 ml-0 d-inline-block">
                                                                {{$trash['location']}}
                                                    </span>

                                                    <div class="col-md-12 col-lg-12 m-2" style="margin: 2px 0!important;padding: 0;">

                                                                <div class="map-header">
                                                                    <div class="map-header-layer" style="border-radius: 7px;" id="map2"></div>
                                                                </div>
                                                    </div><!-- COL END -->

                                                </td>

                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <ul class="nav nav-pills nav-pills-circle " id="tabs_2" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link border pt-3 pb-3 pl-5 pr-5 m-2 active" id="tab1" data-toggle="tab"
                               href="#tabs_2_1" role="tab" aria-selected="true">
                                <span class="nav-link-icon d-block"><i class="fa fa-shopping-cart"></i> {{__('Trash Details')}}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link border pt-3 pb-3 pl-5 pr-5 m-2" id="tab4" data-toggle="tab"
                               href="#tabs_2_3" role="tab" aria-selected="false">
                                <span class="nav-link-icon d-block"><i class="fe fe-layers"></i>{{__('Trash Actions')}} </span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="tabs_2_1" role="tabpanel" aria-labelledby="tab1">

                            <div class="col-sm-12 px-0">
                                <div class="card">

                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table  mb-0 text-nowrap">
                                                <tbody>
                                                    <tr>
                                                        <td class="px-2">
                                                            <div class="software-cat" style="text-align: center;font-size: 21px;margin-top:4px">
{{--                                                                <img src="{{url('Admin/Capture.PNG')}}" alt="img" class=" br-5">--}}
                                                                <i class="ti-trash br-5 "></i>
                                                            </div>
                                                        </td>
                                                        <td class="px-0">
                                                            <h6 class="mb-0 font-weight-bold mt-3">{{__('Trash level')}}</h6>
                                                        </td>
                                                        <td class="text-center" >
                                                            <h6 class="mb-0 font-weight-bold mt-2">
                                                                @if($trash['trash_status'] == 'empty')
                                                                    <a class="btn btn-success btn-sm text-white mb-0" style="width: 110px;">{{__('Empty')}}</a>
                                                                @elseif($trash['trash_status'] == 'full')
                                                                    <a class="btn btn-danger btn-sm text-white mb-0" style="width: 110px;" > {{__('full 100%')}}</a>
                                                                @elseif($trash['trash_status'] == 'Error')
                                                                    <a class="btn btn-danger btn-sm text-white mb-0" style="width: 110px;" > {{__('Error')}}</a>
                                                                @else
                                                                    <a class="btn btn-warning btn-sm text-white mb-0" style="width: 110px;" >  {{__('partially full 70%')}}</a>
                                                                @endif
                                                            </h6>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="px-2">
                                                            <div class="software-cat" style="text-align: center;font-size: 21px;margin-top:4px">
{{--                                                                <img src="{{url('Admin/imgs/Capture.PNG')}}" alt="img" class=" br-5">--}}
                                                                <i class="ti-power-off br-5"></i>
                                                            </div>
                                                        </td>
                                                        <td class="px-0">
                                                            <h6 class="mb-0 font-weight-bold mt-3">{{__('electrical power Condition')}}</h6>
                                                        </td>
                                                        <td class="text-center" >
                                                            <h6 class="mb-0 font-weight-bold mt-2">
                                                                @if($trash['power'] == 1)
                                                                    <a class="btn btn-success btn-sm text-white mb-0" style="width: 110px;">{{__('On')}}</a>
                                                                @else
                                                                    <a class="btn btn-danger btn-sm text-white mb-0" style="width: 110px;" > {{__('Off')}} </a>
                                                                @endif
                                                            </h6>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="px-2">
                                                            <div class="software-cat" style="text-align: center;font-size: 21px;margin-top:4px">
{{--                                                                <img src="{{url('Admin/imgs/Capture2.PNG')}}" alt="img" class=" br-5">--}}
                                                                <i class="ti-key br-5"></i>
                                                            </div>
                                                        </td>
                                                        <td class="px-0">
                                                            <h6 class="mb-0 font-weight-bold mt-3">{{__('Limit switch')}}</h6>
                                                        </td>
                                                        <td class="text-center " >
                                                            <h6 class="mb-0 font-weight-bold mt-2">
                                                                @if($trash['trash_door'] == 1)
                                                                    <a class="btn btn-danger btn-sm text-white mb-0" style="width: 110px;" >{{__('On')}}</a>
                                                                @else
                                                                    <a class="btn btn-success btn-sm text-white mb-0" style="width: 110px;" > {{__('Off')}} </a>
                                                                @endif
                                                            </h6>
                                                        </td>
                                                    </tr>
{{--                                                    <tr>--}}
{{--                                                        <td class="px-2">--}}
{{--                                                            <div class="software-cat" style="text-align: center;font-size: 21px;margin-top:4px">--}}
{{--                                                                <img src="{{url('Admin/imgs/Capture3.PNG')}}" alt="img" class=" br-5">--}}
{{--                                                                <i class="ti-archive br-5"></i>--}}
{{--                                                            </div>--}}
{{--                                                        </td>--}}
{{--                                                        <td class="px-0">--}}
{{--                                                            <h6 class="mb-0 font-weight-bold mt-4">{{__('Tank level')}} </h6>--}}
{{--                                                        </td>--}}
{{--                                                        <td class="text-center">--}}
{{--                                                            <h6 class="mb-0 font-weight-bold mt-3">--}}
{{--                                                                @if($trash['tank_level'] == 'empty')--}}
{{--                                                                    <a class="btn btn-success btn-sm text-white mb-0" style="width: 110px;" >{{__('Empty')}}</a>--}}
{{--                                                                @elseif($trash['tank_level'] == 'full')--}}
{{--                                                                    <a class="btn btn-danger btn-sm text-white mb-0" style="width: 110px;" > {{__('full 100%')}}</a>--}}
{{--                                                                @else--}}
{{--                                                                    <a class="btn btn-warning btn-sm text-white mb-0" style="width: 110px;" >  {{__('partially full 70%')}}</a>--}}
{{--                                                                @endif--}}
{{--                                                            </h6>--}}
{{--                                                        </td>--}}
{{--                                                    </tr>--}}
                                                    <tr>
                                                        <td class="px-2">
                                                            <div class="software-cat" style="text-align: center;font-size: 21px;margin-top:4px">
{{--                                                                <img src="{{url('Admin/imgs/Capture3.PNG')}}" alt="img" class=" br-5">--}}
                                                                <i class="ti-server br-5"></i>
                                                            </div>
                                                        </td>
                                                        <td class="px-0">
                                                            <h6 class="mb-0 font-weight-bold mt-4">{{__('Sanitize tank')}} </h6>
                                                        </td>
                                                        <td class="text-center" >
                                                            <h6 class="mb-0 font-weight-bold mt-3">
                                                                @if($trash['sanitize_tank'] == 'empty')
                                                                    <a class="btn btn-danger btn-sm text-white mb-0" style="width: 110px;" >{{__('Empty')}}</a>
                                                                @elseif($trash['trash_status'] == 'Error')
                                                                    <a class="btn btn-danger btn-sm text-white mb-0" style="width: 110px;" > {{__('Error')}}</a>
                                                                @elseif($trash['sanitize_tank'] == 'full')
                                                                    <a class="btn btn-success btn-sm text-white mb-0" style="width: 110px;" > {{__('full 100%')}}</a>
{{--                                                                @else--}}
{{--                                                                    <a class="btn btn-warning btn-sm text-white mb-0" style="width: 110px;" >  {{__('partially full 70%')}}</a>--}}
                                                                @endif
                                                            </h6>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="px-2">
                                                            <div class="software-cat" style="text-align: center;font-size: 21px;margin-top:4px">
{{--                                                                <img src="{{url('Admin/imgs/Capture4.PNG')}}" alt="img" class=" br-5">--}}
                                                                <i class="ti-reload br-1"></i>
                                                            </div>
                                                        </td>
                                                        <td class="px-0">
                                                            <h6 class="mt-3 font-weight-bold">{{__('Motor Over load')}}</h6>
                                                        </td>
                                                        <td class="text-center " >
                                                            <h6 class="mb-0 font-weight-bold mt-2">
                                                                @if($trash['motor_over_load'] == 1)
                                                                    <a class="btn btn-danger btn-sm text-white mb-0" style="width: 110px;" >{{__('On')}}</a>
                                                                @else
                                                                    <a class="btn btn-success btn-sm text-white mb-0" style="width: 110px;" > {{__('Off')}} </a>
                                                                @endif
                                                            </h6>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="tabs_2_3" role="tabpanel" aria-labelledby="tab4">

                            <!-- ROW -->
                            <div class="row">
                                <div class="col-12 ">
                                    <div class="card">
                                        <div class="card-status bg-blue br-tr-7 br-tl-7"></div>
                                        <div class="card-header">
                                            <div class="card-title">{{__('Trash activity filter')}}</div>
                                            <div class="card-options">
                                                <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                                <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <p class="mg-b-20 mg-sm-b-40">{{__('choose start date or end date or search text')}}</p>
                                            <form class="wd-200 mg-b-30 row" action="{{route('trash_details',$trash->id)}}">
                                                <div class="input-group col-lg-3 col-md-6 col-sm-12 mb-2" >
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                                        </div>
                                                    </div>
                                                    <input class="form-control fc-datepicker "  data-date-format="DD/MM/YYYY" name="time_from" value="{{$time_from}}"  placeholder="{{__('from date')}} " type="text">
                                                </div>
                                                <div class="input-group col-lg-3 col-md-6 col-sm-12 mb-2" >
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                                        </div>
                                                    </div>
                                                    <input class="form-control fc-datepicker " data-date-format="DD/MM/YYYY"  name="time_to" value="{{$time_to}}" placeholder="{{__('to date')}} " type="text">
                                                </div>
                                                <div class="input-group col-lg-3 col-md-6 col-sm-12 mb-2" >
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fa fa-search tx-16 lh-0 op-6"></i>
                                                        </div>
                                                    </div>
                                                    <input class="form-control " name="activity" value="{{$activity}}" placeholder="{{__('trash action text')}} ... " type="text">
                                                </div>
                                                <input type="submit" class="btn btn-success-light col-lg-3 col-md-6 col-sm-12" value="{{__('Search')}}">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- ROW END -->
                            <div class="row">
                            <div class="col-12 ">
                                <div class="card overflow-hidden">
                                    <div class="card-body pb-0">
                                        <div class="float-left">
                                            <p class="mb-1">{{__('Trash Details Chart')}}</p>
{{--                                            <h2 class="counter mb-0">78%</h2>--}}
                                        </div>
                                        <div class="float-right">
                                            <span class="mini-stat-icon bg-info"><i class="si si-eye "></i></span>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0 pb-0 border-top-0 overflow-hidden">
                                        <div class="chart-wrapper overflow-hidden">
                                            <canvas id="areaChart1" class="areaChart overflow-hidden chart-dropshadow-primary" ></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- COL END -->
                            </div>

                            <div class="row">

                                <div class="col-12" style="max-height: 2000px;overflow: scroll">
                                    <ul class="cbp_tmtimeline">
                                        @foreach($trash->activities as $activity)
                                        <li>
                                            <time class="cbp_tmtime" datetime="2017-11-04T18:30"><span>{{date('Y/m/d',strtotime($activity->time))}}</span>
                                                <span>{{date('h:i:s A',strtotime($activity->time))}}</span></time>
                                            <div class="cbp_tmicon
                                            bg-@if($activity->good=='yes')success
                                                @elseif($activity->good=='between')warning
                                                @elseif($activity->good=='no')danger
                                                @endif">
                                                <i class="fa
                                                @if($activity->good=='yes') fa-check
                                                @elseif($activity->good=='between') fa-info
                                                @elseif($activity->good=='no') fa-times
                                                @endif
                                                 " style="color: white;margin-top: 10px;"></i></div>
                                            <div class="cbp_tmlabel empty font-weight-bold"> <span>{{$activity->activity}}</span> </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>

                            </div>


                        </div>
                    </div>


                </div>
            </div>
        </div><!-- COL-END -->
    </div>
@endsection

@push('admin_js')
    {{--    #######################  filter ##############################--}}
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

{{--    <script>--}}
{{--        $(document).ready(function() {--}}
{{--            $('.card-options-collapse').click();--}}
{{--        })--}}
{{--    </script>--}}
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyAykAdIIsNMu0V2wyGOMQcguo8zKngWlyM"></script>
    @include('layouts.admin.maps-google.googlemap')
    <script>
        $(function() {
            $("#map2").googleMap();
            $("#map2").addMarker({
                coords: [{{$trash['latitude']}}, {{$trash['longitude']}}], // GPS coords
                title: '{{$trash['device_name']}}', // Title
                text:  '<b>Map </b> for trash location.' // HTML content
            });
        })
    </script>

    <script>
        /* Chartjs (#areaChart1) */
        var ctx = document.getElementById('areaChart1').getContext('2d');

        var myChart = new Chart( ctx, {
            type: 'line',
            data: {
                labels: [
                    @foreach($activities as $activity)
                        '{{$activity["activity"]}}',
                    @endforeach
                ],
                type: 'line',
                datasets: [ {
                    label: "{{__('error number')}}",
                    data:[
                        @foreach($activities as $activity)
                            '{{$activity["count"]}}',
                        @endforeach
                    ],
                    backgroundColor: 'transparent',
                    borderColor: '#0774f8',
                    pointBackgroundColor:'#fff',
                    pointHoverBackgroundColor:'#0774f8',
                    pointBorderColor :'#0774f8',
                    pointHoverBorderColor :'#0774f8',
                    pointBorderWidth :2,
                    pointRadius :2,
                    pointHoverRadius :2,
                    borderWidth: 4
                }, ]
            },
            options: {
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                responsive: true,
                tooltips: {
                    mode: 'index',
                    titleFontSize: 12,
                    titleFontColor: '#6b6f80',
                    bodyFontColor: '#6b6f80',
                    backgroundColor: '#fff',
                    titleFontFamily: 'Montserrat',
                    bodyFontFamily: 'Montserrat',
                    cornerRadius: 3,
                    intersect: false,
                },
                scales: {
                    xAxes: [ {
                        gridLines: {
                            color: 'transparent',
                            zeroLineColor: 'transparent'
                        },
                        ticks: {
                            fontSize: 2,
                            fontColor: 'transparent'
                        }
                    } ],
                    yAxes: [ {
                        display:false,
                        ticks: {
                            display: false,
                        }
                    } ]
                },
                title: {
                    display: false,
                },
                elements: {
                    line: {
                        borderWidth: 1
                    },
                    point: {
                        radius: 4,
                        hitRadius: 10,
                        hoverRadius: 4
                    }
                }
            }
        });
        /* Chartjs (#areaChart1) closed */

    </script>
{{--    <script src="https://laravel.spruko.com/yoha/Sidemenu-Icon-Light/assets/js/widget.js"></script>--}}

@endpush
