@extends('layouts.admin.app')
@section('page_title') {{__('Setting')}} @endsection
<!-- INTERNAL  WYSIWYG EDITOR CSS -->
{{--<link href="{{url('Admin')}}/assets/plugins/wysiwyag/richtext.css"--}}
{{--      rel="stylesheet"/>--}}

{{--<script src="https://cdn.ckeditor.com/4.19.0/full-all/ckeditor.js"></script>--}}
@section('content')
    <div class="row">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{__('Setting')}}</h3>
                </div>
                <div class="card-body">
                    <form  action="{{route('settings.update',$setting->id)}}" id="Form" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
{{--                            <div class="col-lg-12 col-md-12">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label >Ultima volta per ordinare</label>--}}
{{--                                    <input name="order_time" min="00:00" max="24:00" type="time" value="{{$setting->order_time}}"  class="form-control" placeholder="وقت الطلب ...">--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="form-group col-lg-12 col-md-12">
                                <label >{{__('App name')}}</label>
                                <input name="app_name" type="text" value="{{$setting->app_name}}" class="form-control " placeholder="{{__('App name')}} ...">
                            </div>
                        </div>

                        <!--begin::Input group-->
{{--                        <div class=" mb-2 fv-row col-sm-12 mt-0 row">--}}
{{--                            <!--begin::Label-->--}}
{{--                            <label class=" align-items-center fs-6 fw-bold form-label col-sm-6">--}}
{{--                                <span class="required">Attivazione automatica degli utenti</span>--}}
{{--                            </label>--}}
{{--                            <!--end::Label-->--}}
{{--                            <div class=" align-items-center mb-3 mt-3 col-sm-6">--}}
{{--                                <div class="material-switch pull-left">--}}
{{--                                    <input id="someSwitchOptionPrimary" {{$setting->is_active == 'yes' ? 'checked' : '' }} name="is_active" type="checkbox"/>--}}
{{--                                    <label for="someSwitchOptionPrimary" class="label-primary"></label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row">--}}
{{--                            <div class="col-12">--}}
{{--                                <div class="card">--}}
{{--                                    <div class="card-header">--}}
{{--                                        <div class="card-title">Termini e Condizioni</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="card-body">--}}
{{--                                        <textarea  name="terms" id="terms">{!! $setting->terms !!}</textarea>--}}
{{--                                        <textarea class="content" name="terms">{!! $setting->terms !!}</textarea>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label >{{__('Logo')}}</label>
                                        <div class="input-group file-browser">
                                            <input type="text" class="form-control browse-file" placeholder="{{__('select')}}" readonly>
                                            <label class="input-group-btn">
													<span class="btn btn-primary">
														{{__('Browse')}} <input accept="image/*" name="logo" id="imgInp1" type="file" style="display: none;" >
													</span>
                                            </label>
                                        </div>
{{--                                        <input accept="image/*" type='file'  name="logo"  class="form-control form-control-solid" />--}}
                                        <img width="100" height="100" id="blah1" src="{{get_file($setting->logo)}}" alt="your image" />
                                   </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label >{{__('Fav Icon')}}</label>
                                    <div class="input-group file-browser">
                                        <input type="text" class="form-control browse-file" placeholder="{{__('select')}}" readonly>
                                        <label class="input-group-btn">
													<span class="btn btn-primary">
														{{__('Browse')}} <input accept="image/*" id="imgInp2" name="fav_icon" type="file" style="display: none;" >
													</span>
                                        </label>
                                    </div>
{{--                                        <input accept="image/*" type='file' id="imgInp2" name="fav_icon"  class="form-control form-control-solid" />--}}
                                        <img width="100" height="100" id="blah2" src="{{get_file($setting->fav_icon)}}" alt="your image" />
                                   </div>
                            </div>
                        </div>
                        <!-- ROW-2 CLOSED -->
                        <div class="card-footer ">
                            <input type="submit" class="btn btn-success mt-1" value="{{__('save')}}">
                            <input type="reset" class="btn btn-danger mt-1" value="{{__('Cancel')}}">
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
@endsection
@push('admin_js')
    <script>
        imgInp1.onchange = evt => {
            $('#blah1').show()
            const [file] = imgInp1.files
            if (file) {
                blah1.src = URL.createObjectURL(file)
            }
        }
        imgInp2.onchange = evt => {
            $('#blah2').show()
            const [file] = imgInp2.files
            if (file) {
                blah2.src = URL.createObjectURL(file)
            }
        }
    </script>

    <script>
        $(document).on('submit', 'form#Form', function (e) {
            e.preventDefault();
            var form_data = new FormData(document.getElementById("Form"));
            var url = $('#Form').attr('action');
            $.ajax({
                type: 'POST',
                url: url,
                data: form_data,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function(){
                    $('#global-loader').show()
                },
                success: function (data) {
                    window.setTimeout(function() {
                        $('#global-loader').hide()
                        if (data.success == 'true') {
                            var messages = Object.values(data.messages);
                            $( messages ).each(function(index, message ) {
                                my_toaster(message)
                            });
                        }
                    }, 100);
                }, error: function (data) {
                    $('#global-loader').hide()
                    var error = Object.values(data.responseJSON.errors);
                    $( error ).each(function(index, message ) {
                        my_toaster(message,'error')
                    });
                }
            });
        });
    </script>

    <!-- INTERNAL   WYSIWYG Editor JS -->
{{--    <script src="{{url('Admin')}}/assets/plugins/wysiwyag/jquery.richtext.js"></script>--}}
{{--    <script src="{{url('Admin')}}/assets/plugins/wysiwyag/wysiwyag.js"></script>--}}
{{--    <script>--}}
{{--        CKEDITOR.config.contentsLangDirection = 'ltr';--}}
{{--        CKEDITOR.replace( 'terms' );--}}
{{--    </script>--}}
@endpush
