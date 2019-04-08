@extends('layout.main_layout')

@section('main-content')
    <div class="main-content">
        <div class="section__content section__content--p30">

            <div class="container-fluid">
                <div class="row ">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">Detail</h2>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <button class="au-btn au-btn-icon au-btn--blue" onclick="editVendor({{$vendor->ID}})">
                            <i class="zmdi zmdi-edit"></i>edit vendor
                        </button>
                    </div>
                </div>
                <div class="row m-t-25">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">Company Name :</div>
                                    <div class="col-md-9">{{$vendor->COMPANY_NAME}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">Contact Person Name :</div>
                                    <div class="col-md-9">{{$vendor->CONTACT_PERSON_NAME}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">Phone Number :</div>
                                    <div class="col-md-9">{{$vendor->PHONE_NO}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">Address :</div>
                                    <div class="col-md-9">{{$vendor->ADDRESS1}}</div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-9">{{$vendor->ADDRESS2}}</div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-9">{{$vendor->ADDRESS3}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">Postcode :</div>
                                    <div class="col-md-3">{{$vendor->POSTCODE }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">State Code :</div>
                                    <div class="col-md-9">{{$vendor->stateCode->NAME}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function editVendor(vendorId)
        {
            window.location.assign('{{url('vendors/edit')}}/' + vendorId);
        }
    </script>

@endsection

