<!--begin::Form-->

<form id="form" enctype="multipart/form-data" method="POST" action="{{route('activities.store')}}">
    @csrf
    <div class="row mt-0">
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



