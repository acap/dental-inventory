/**
 * Created by PhpStorm.
 * User: User
 * Date: 28/2/2019
 * Time: 12:34 AM
 */

@extends('layout.main_layout')

@section('main-content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">

                <div class="row ">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">Configuration</h2>
                        {{--</div>--}}
                        {{--<div class="fa-align-right">--}}
                            <button class="au-btn au-btn-icon au-btn--blue" onclick="edit()">
                                <i class="zmdi zmdi-plus"></i>Edit
                            </button>
                    </div>
                </div>

                <div class="row m-t-25">
                    <div class="col-lg-12">
                        <div class="card">
                            {{--<div class="card-header">Client #{{$client->IC_NO}}</div>--}}
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">Name</div>
                                    <div class="col-md-9">{{$businessName->VALUE_}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">Address</div>
                                    <div class="col-md-9">{{$businessAddress1->VALUE_}}</div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-9">{{$businessAddress2->VALUE_}}</div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-9">{{$businessAddress3->VALUE_}}</div>
                                    <div class="col-md-3"></div>
                                    <div class="col-md-9">{{$businessPostcode->VALUE_}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">Phone Number</div>
                                    <div class="col-md-9">{{$businessPhoneNo->VALUE_}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    @endsection

@section('main-script')
    <script>

        jQuery(document).ready(function($) {
            $(".clickable-row").click(function() {
                window.location = $(this).data("href");
            });
        });

        function edit() {
            window.location.assign('{{url('/ownerConfigurations/edit')}}');
        }

        $('#success').delay(1000).fadeOut('fast');

    </script>
@endsection

