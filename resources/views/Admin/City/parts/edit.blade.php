
<form id="form" enctype="multipart/form-data" method="POST" action="{{route('cities.update',$city->id)}}">
    @csrf
    @method('PUT')
    <div class="row mt-0">
        <div class="d-flex flex-column mb-2 fv-row col-md-12 col-sm-12 mt-0">
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required">name (en) </span>
                <i class="fa fa-asterisk ms-5 text-danger" title="name (en)"></i>
            </label>
            <input type="text" class="form-control form-control-solid " placeholder="name (en)"
                   name="name_en" value="{{$city->name_en}}"/>
        </div>
        <!--end::Input group-->
        <div class="d-flex flex-column mb-2 fv-row col-md-12 col-sm-12 mt-0">
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required">name (fr) </span>
                <i class="fa fa-asterisk ms-5 text-danger" title="name (fr)"></i>
            </label>
            <input type="text" class="form-control form-control-solid " placeholder="name (fr)"
                   name="name_fr" value="{{$city->name_fr}}"/>
        </div>
        <!--end::Input group-->

    </div>

</form>
<!--end::Form-->

