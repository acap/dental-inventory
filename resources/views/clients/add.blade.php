@extends('layout.main_layout')

@section('main-content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">Client Form</div>
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">Add Client</h3>
                                </div>
                                <hr>
                                <form action="{{url('/clients/post_add')}}" method="post" novalidate="novalidate">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name" class="control-label mb-1">NAME</label>
                                        <input id="name" name="name" type="text" class="form-control"
                                               aria-required="true" aria-invalid="false">
                                    </div>
                                    <div class="form-group">
                                        <label for="ic_no" class="control-label mb-1">IC NUMBER</label>
                                        <input id="ic_no" name="ic_no" type="text" class="form-control"
                                               aria-required="true" aria-invalid="false">
                                    </div>
                                    <div class="form-group">
                                        <label for="address" class="control-label mb-1">ADDRESS</label>
                                        <input id="address" name="address" type="text" class="form-control"
                                               aria-required="true" aria-invalid="false">
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
                                                <option value="{{$stateCode->ID}}">{{$stateCode->CODE}} - {{$stateCode->NAME}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div>
                                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
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
