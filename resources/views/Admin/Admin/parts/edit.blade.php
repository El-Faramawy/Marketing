<!--begin::Form-->
<link rel="stylesheet" href="{{url('Admin')}}/assets/plugins/multipleselect/multiple-select.css">

<form id="form" enctype="multipart/form-data" method="POST" action="{{route('admins.update',$admin->id)}}">
    @csrf
    @method('PUT')
    <div class="row mt-0">
        <!--begin::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-sm-12 mt-0">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required">{{__('name')}} </span>
                <i class="fa fa-asterisk ms-5 text-danger " title="{{__('name')}}"></i>
            </label>
            <!--end::Label-->
            <input type="text" class="form-control form-control-solid" placeholder="{{__('name')}}" name="name" value="{{$admin->name}}"/>
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-sm-12">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required"> {{__('E-mail')}} </span>
                <i class="fa fa-asterisk ms-5 text-danger" title="{{__('E-mail')}}"></i>
            </label>
            <!--end::Label-->
            <input type="email" class="form-control form-control-solid" placeholder="{{__('E-mail')}}" name="email"
                   value="{{$admin->email}}"/>
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="d-flex flex-column mb-1 fv-row  col-sm-12">
            <!--begin::Label-->
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required">{{__('Password')}} </span>
                <i class="fa fa-asterisk ms-5 text-danger" title="{{__('Password')}}"></i>
            </label>
            <!--end::Label-->
            <input type="password" class="form-control form-control-solid" placeholder="{{__('Password')}}" name="password"
                   value=""/>
        </div>
        <!--end::Input group-->
{{--        <div class="d-flex flex-column mb-2 fv-row col-sm-12 form-group">--}}
{{--            <label class="d-flex align-items-center fs-6 fw-bold form-label ">--}}
{{--                <span class="required"> {{__('permissions')}} </span>--}}
{{--                <i class="fa fa-asterisk ms-5 text-danger" title="{{__('permissions')}}"></i>--}}
{{--            </label>--}}
{{--            <select multiple="multiple" name="permissions[]" class="group-filter">--}}
{{--                @foreach($sections as $section )--}}
{{--                    <optgroup label="{{__($section->name)}}">--}}
{{--                        @foreach($section->sectionPermissions as $permission)--}}
{{--                            <option {{in_array($permission->id,$admin->permission_ids)?'selected':''}}  value="{{$permission->id}}">{{__($permission->name)}}</option>--}}
{{--                        @endforeach--}}
{{--                    </optgroup>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--        </div>--}}

    </div>

</form>
<!--end::Form-->

<!-- INTERNAL MULTI SELECT JS -->
<script src="{{url('Admin')}}/assets/plugins/multipleselect/multiple-select.js"></script>
<script src="{{url('Admin')}}/assets/plugins/multipleselect/multi-select.js"></script>
