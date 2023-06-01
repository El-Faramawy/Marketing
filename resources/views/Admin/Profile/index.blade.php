@extends('layouts.admin.app')
@section('page_title') {{__('Profile')}} @endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{__('Edit Profile')}}</h3>
                </div>
                <div class="card-body">
                    <form  action="{{route('profile.update')}}" id="Form" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <label for="exampleInputname">{{__('name')}}</label>
                                <input name="name" type="text" value="{{admin()->user()->name}}"  class="form-control" id="exampleInputname" placeholder="{{__('name')}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">{{__('E-mail')}}</label>
                        <input name="email" type="email" value="{{admin()->user()->email}}" class="form-control" id="exampleInputEmail1" placeholder="{{__('E-mail')}}">
                    </div>

                    <div class="form-group">
                        <label class="form-label">{{__('Password')}}</label>
                        <input type="password" name="password" class="form-control" placeholder="*******">
                    </div>
                    <div class="form-group">
                        <label class="form-label">{{__('Confirm password')}} </label>
                        <input type="password" name="confirm_password" class="form-control" placeholder="*******">
                    </div>
                        <div class="card-footer ">
                            <input type="submit" class="btn btn-success mt-1" value="Save">
                            <input type="reset" class="btn btn-danger mt-1" value="Reset">
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
@endsection
@push('admin_js')

    <script>
        $(document).on('submit', '#Form', function (event) {
            event.preventDefault();
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
                        if (data.success == 'false') {
                            var messages = Object.values(data.messages);
                            $( messages ).each(function(index, message ) {
                                my_toaster(message,'error')
                            });
                        }
                    }, 1000);
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

@endpush
