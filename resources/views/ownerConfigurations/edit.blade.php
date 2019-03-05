/**
 * Created by PhpStorm.
 * User: User
 * Date: 1/3/2019
 * Time: 5:16 PM
 */

@extends('layout.main_layout')

@section('main-content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">configurations Form</div>
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">Edit configuration</h3>
                                </div>
                                <hr>
                                <form action="{{url('/ownerConfigurations/post_edit')}}" method="post" novalidate="novalidate">
                                    @csrf
                                    <div class="form-group">
                                        <label for="business_name" class="control-label mb-1">Business Name</label>
                                        <input id="business_name" name="business_name" type="text"
                                               value="{{$businessName->VALUE_}}"
                                               class="form-control"
                                               aria-required="true" aria-invalid="false">
                                    </div>
                                    <div class="form-group">
                                        <label for="business_address" class="control-label mb-1">Business Address</label>
                                        <input id="business_address1" name="business_address1" type="text"
                                               value="{{$businessAddress1->VALUE_}}"
                                               class="form-control"
                                               aria-required="true" aria-invalid="false">
                                        <input id="business_address2" name="business_address2" type="text"
                                               value="{{$businessAddress2->VALUE_}}"
                                               class="form-control"
                                               aria-required="true" aria-invalid="false">
                                        <input id="business_address3" name="business_address3" type="text"
                                               value="{{$businessAddress3->VALUE_}}"
                                               class="form-control"
                                               aria-required="true" aria-invalid="false">
                                    </div>
                                    <div class="form-group">
                                        <label for="business_postcode" class="control-label mb-1">Business Postcode</label>
                                        <input id="business_postcode" name="business_postcode" type="text"
                                               value="{{$businessPostcode->VALUE_}}"
                                               class="form-control"
                                               aria-required="true" aria-invalid="false">
                                    </div>
                                    <div class="form-group">
                                        <label for="business_phoneNo" class="control-label mb-1">Business Phone number</label>
                                        <input id="business_phoneNo" name="business_phoneNo" type="text"
                                               value="{{$businessPhoneNo->VALUE_}}"
                                               class="form-control"
                                               aria-required="true" aria-invalid="false">
                                    </div>
                                    <div>
                                        <button id="configuration-button" type="submit" class="btn btn-lg btn-info btn-block">
                                            <i class="fa fa-lock fa-lg"></i>&nbsp;Submit
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
