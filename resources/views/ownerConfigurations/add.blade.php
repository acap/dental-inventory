@extends('layout.main_layout')

@section('main-content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">Configuration Form</div>
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">Add Owner</h3>
                                </div>
                                <hr>
                                <form action="{{url('/ownerConfigurations/post_add')}}" method="post" novalidate="novalidate">
                                    @csrf
                                    <div class="form-group">
                                        <label for="businessName" class="control-label mb-1">NAME OF THE COMPANY</label>
                                        <input id="businessName" name="businessName" type="text" class="form-control"
                                               aria-required="true" aria-invalid="false">
                                    </div>
                                    <div class="form-group">
                                        <label for="buisnessAddress" class="control-label mb-1">ADDRESS</label>
                                        <input id="businessAddress1" name="businessAddress1" type="text" class="form-control"
                                               aria-required="true" aria-invalid="false">
                                        <input id="businessAddress2" name="businessAddress2" type="text" class="form-control"
                                               aria-required="true" aria-invalid="false">
                                        <input id="businessAddress3" name="businessAddress3" type="text" class="form-control"
                                               aria-required="true" aria-invalid="false">
                                    </div>
                                    <div class="form-group">
                                        <label for="businessPostcode" class="control-label mb-1">POSTCODE</label>
                                        <input id="businessPostcode" name="businessPostcode" type="text" class="form-control"
                                               aria-required="true" aria-invalid="false">
                                    </div>
                                    <div class="form-group">
                                        <label for="businessPhoneNO" class="control-label mb-1">PHONE NUMBER</label>
                                        <input id="businessPhoneNO" name="businessPhoneNO" type="text" class="form-control"
                                               aria-required="true" aria-invalid="false">
                                    </div>
                                    <div>
                                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                            <i class="fa fa-fighter-jet fa-lg"></i>&nbsp;Submit
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
