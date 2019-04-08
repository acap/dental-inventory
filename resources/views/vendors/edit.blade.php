@extends('layout.main_layout')

@section('main-content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">Vendor</div>
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">Edit Profile Vendor</h3>
                                </div>
                                <form action="{{url('vendors/post_edit')}}" method="post" novalidate="novalidate">
                                    @csrf
                                    <input id="id" name="id" value="{{$vendor->ID}}" hidden/>
                                    <div class="form-group">
                                        <label for="company_name" class="control-label mb-1">Company Name : </label>
                                        <input id="company_name" name="company_name" type="text" placeholder="zawiyah sdb bhd"
                                               value="{{$vendor->COMPANY_NAME}}"
                                               class="form-control"
                                               aria-required="true" aria-invalid="false">
                                    </div>

                                    <div class="form-group">
                                        <label for="contact_person_name" class="control-label mb-1">Contact Person Name : </label>
                                        <input id="contact_person_name" name="contact_person_name" type="text"
                                               placeholder="Contact Person Name"
                                               value="{{$vendor->CONTACT_PERSON_NAME}}"
                                               class="form-control"
                                               aria-required="true" aria-invalid="false">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone_no" class="control-label mb-1">Phone Number : </label>
                                        <input id="phone_no" name="phone_no" type="text"
                                               placeholder="Phone Number"
                                               value="{{$vendor->PHONE_NO}}"
                                               class="form-control"
                                               aria-required="true" aria-invalid="false">
                                    </div>
                                    <div class="form-group">
                                        <label for="address" class="control-label mb-1">Address : </label>
                                        <input id="address1" name="address1" type="text"
                                               placeholder="Address"
                                               value="{{$vendor->ADDRESS1}}"
                                               class="form-control"
                                               aria-required="true" aria-invalid="false">
                                        <input id="address2" name="address2" type="text"
                                               placeholder="Address"
                                               value="{{$vendor->ADDRESS2}}"
                                               class="form-control"
                                               aria-required="true" aria-invalid="false">
                                        <input id="address3" name="address3" type="text"
                                               placeholder="Phone Number"
                                               value="{{$vendor->ADDRESS3}}"
                                               class="form-control"
                                               aria-required="true" aria-invalid="false">
                                    </div>
                                    <div class="form-group">
                                        <label for="postcode" class="control-label mb-1">Post Code : </label>
                                        <input id="postcode" name="postcode" type="text"
                                               placeholder="Postcode"
                                               value="{{$vendor->POSTCODE}}"
                                               class="form-control"
                                               aria-required="true" aria-invalid="false">
                                    </div>
                                    <div class="form-group">
                                        <label for="state_code_id" class=" form-control-label">Select State</label>
                                        <select name="state_code_id" id="state_code_id"
                                                class="form-control-lg form-control">
                                            <option value="0">Please select</option>
                                            @foreach($stateCodes as $stateCode)
                                                @if($vendor->stateCode->ID == $stateCode->ID)
                                                <option selected value="{{$stateCode->ID}}">{{$stateCode->NAME}}</option>
                                                @else
                                                <option value="{{$stateCode->ID}}">{{$stateCode->NAME}}</option>e
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        <i class="fa fa-lock fa-lg"></i>&nbsp;Submit
                                    </button>
                                </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection