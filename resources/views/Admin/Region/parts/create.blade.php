<!--begin::Form-->
<link href="{{url('Admin')}}/assets/plugins/select2/select2.min.css" rel="stylesheet"/>

<form id="form" enctype="multipart/form-data" method="POST" action="{{route('regions.store')}}">
    @csrf
    <div class="row mt-0">
        <div class=" mb-2 row col-12 col-lg-6 mt-0 ml-3">
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required">city </span>
                <i class="fa fa-asterisk ms-5 text-danger" title="city"></i>
            </label>
            <br>
            <select name="city_id" class="form-control form-control-solid select2">
                <option value="" selected disabled> choose city ...</option>
                @foreach($cites as $city)
                    <option  value="{{$city->id}}">{{$city->name_en}} </option>
                @endforeach
            </select>
        </div>

        <div class="d-flex flex-column mb-2 fv-row col-md-12 col-sm-12 mt-0">
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required">name (en) </span>
                <i class="fa fa-asterisk ms-5 text-danger" title="name (en)"></i>
            </label>
            <input type="text" class="form-control form-control-solid " placeholder="name (en)"
                   name="name_en" value=""/>
        </div>
        <!--end::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-md-12 col-sm-12 mt-0">
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required">name (fr) </span>
                <i class="fa fa-asterisk ms-5 text-danger" title="name (fr)"></i>
            </label>
            <input type="text" class="form-control form-control-solid " placeholder="name (fr)"
                   name="name_fr" value=""/>
        </div>
        <!--end::Input group-->

    </div>
</form>
<!--end::Form-->

<script src="{{url('Admin')}}/assets/plugins/select2/select2.full.min.js"></script>
<script src="{{url('Admin')}}/assets/js/select2.js"></script>

