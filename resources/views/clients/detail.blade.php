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
                            <div class="card-header">Client #{{$client->IC_NO}}</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">Name</div>
                                    <div class="col-md-9">{{$client->NAME}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">Phone Number</div>
                                    <div class="col-md-9">{{$client->PHONE_NO}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">Address</div>
                                    <div class="col-md-9">{{$client->ADDRESS1}}</div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-9">{{$client->ADDRESS2}}</div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-9">{{$client->ADDRESS3}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">Postcode</div>
                                    <div class="col-md-3">{{$client ->POSTCODE }}</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">State Code</div>
                                    <div class="col-md-9">{{$client->stateCode->NAME}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

