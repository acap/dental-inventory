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
                </div>

                <div class="row m-t-25">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">Company Name :</div>
                                    <div class="col-md-9">{{$detail->COMPANY_NAME}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">Contact Person Name :</div>
                                    <div class="col-md-9">{{$detail->CONTACT_PERSON_NAME}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">Phone Number :</div>
                                    <div class="col-md-9">{{$detail->PHONE_NO}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">Address :</div>
                                    <div class="col-md-9">{{$detail->ADDRESS1}}</div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-9">{{$detail->ADDRESS2}}</div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-9">{{$detail->ADDRESS3}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">Postcode :</div>
                                    <div class="col-md-3">{{$detail->POSTCODE }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">State Code :</div>
                                    <div class="col-md-9">{{$detail->stateCode->NAME}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

