@extends('layouts.admin.app')
@section('page_title') Users @endsection
<link href="{{url('Admin')}}/assets/plugins/select2/select2.min.css" rel="stylesheet"/>
@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title" >Users</h3>
                    <div class="ml-auto pageheader-btn">
                            <a href="#" id="multiDeleteBtn" class="btn btn-danger btn-icon text-white">
                                            <span>
                                                <i class="fa fa-trash-o"></i>
                                            </span>delete selected
                            </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="exportexample" class="table table-striped table-responsive-lg  card-table table-vcenter text-nowrap mb-0 table-primary align-items-center mb-0">
                            <thead class="bg-primary text-white">
                            <tr>
                                <th class="text-white"><input type="checkbox" id="master"></th>
                                <th class="text-white">Name</th>
                                <th class="text-white">E-mail</th>
                                <th class="text-white">activity</th>
                                <th class="text-white">postal code</th>
                                <th class="text-white">City</th>
                                <th class="text-white">region</th>
                                <th class="text-white">Address</th>
                                <th class="text-white">price</th>
                                <th class="text-white">card number</th>
                                <th class="text-white">month</th>
                                <th class="text-white">year</th>
                                <th class="text-white">cvv</th>
                                <th class="text-white">Block</th>
                                <th class="text-white">Delete</th>
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

@endsection
@push('admin_js')
    <script>
        var  columns =[
            {data: 'checkbox', name: 'checkbox', orderable: false, searchable: false},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'activity', name: 'activity'},
            {data: 'postal_code', name: 'postal_code'},
            {data: 'city', name: 'city'},
            {data: 'region', name: 'region'},
            {data: 'address', name: 'address'},
            {data: 'price', name: 'price'},
            {data: 'card_number', name: 'card_number'},
            {data: 'month', name: 'month'},
            {data: 'year', name: 'year'},
            {data: 'cvv', name: 'cvv'},
            {data: 'block', name: 'block'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ];
        //======================== addBtn =============================

    </script>
    @include('layouts.admin.inc.ajax',['url'=>'users'])
    @include('Admin.User.parts.block',['url'=>'users'])

@endpush
