@extends('layout.main_layout')

@section('main-content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">Vendor Form</div>
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">Add Vendor</h3>
                                </div>
                                <hr>
                                <form action="{{url('/vendors/post_add')}}" method="post" novalidate="novalidate">
                                    @csrf
                                    <div class="form-group">
                                        <label for="company_name" class="control-label mb-1">COMPANY NAME</label>
                                        <input id="company_name" name="company_name" type="text" class="form-control"
                                               aria-required="true" aria-invalid="false">
                                    </div>
                                    <div class="form-group">
                                        <label for="contact_person_name" class="control-label mb-1">CONTACT PERSON
                                            NAME</label>
                                        <input id="contact_person_name" name="contact_person_name" type="text"
                                               class="form-control"
                                               aria-required="true" aria-invalid="false">
                                    </div>
                                    <div class="form-group">
                                        <label for="address" class="control-label mb-1">ADDRESS</label>
                                        <input id="address1" name="address1" type="text" class="form-control"
                                               aria-required="true" aria-invalid="false">
                                        <input id="address2" name="address2" type="text" class="form-control"
                                               aria-required="true" aria-invalid="false">
                                        <input id="address3" name="address3" type="text" class="form-control"
                                               aria-required="true" aria-invalid="false">
                                    </div>
                                    <div class="form-grop">
                                        <label for="postcode" class="contol-label mb-1">POSTCODE</label>
                                        <input id="postcode" name="postcode" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone_no" class="control-label mb-1">PHONE NUMBER</label>
                                        <input id="phone_no" name="phone_no" type="text" class="form-control"
                                               aria-required="true" aria-invalid="false">
                                    </div>
                                    <div class="form-group">
                                        <label for="state_code_id" class=" form-control-label">Select State</label>
                                        <select name="state_code_id" id="state_code_id"
                                                class="form-control-lg form-control">
                                            <option value="0">Please select</option>
                                            @foreach($xxx as $stateCode)
                                                <option value="{{$stateCode->ID}}">{{$stateCode->CODE}}
                                                    - {{$stateCode->NAME}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div>
                                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                            <i class="fa fa-send fa-lg"></i>&nbsp;Submit
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
