<!--begin::Form-->
<!-- INTERNAL  FILE UPLOADE CSS -->
<link href="{{url('Admin')}}/assets/plugins/fileuploads/css/fileupload.css" rel="stylesheet" type="text/css" />
<!-- INTERNAL  FILE UPLOADES JS -->
<script src="{{url('Admin')}}/assets/plugins/fileuploads/js/fileupload.js"></script>
<script src="{{url('Admin')}}/assets/plugins/fileuploads/js/file-upload.js"></script>

<form id="form" enctype="multipart/form-data" method="POST" action="{{route('prices.store')}}">
    @csrf
    <div class="row mt-0">
        <div class="d-flex flex-column mb-2 fv-row col-md-12 col-sm-12 mt-0">
            <label class="d-flex align-items-center fs-6 fw-bold form-label ">
                <span class="required">price </span>
                <i class="fa fa-asterisk ms-5 text-danger" title="price"></i>
            </label>
            <input type="text" class="form-control form-control-solid " placeholder="price"
                   name="price" value=""/>
        </div>
        <!--end::Input group-->

    </div>
</form>
<!--end::Form-->



