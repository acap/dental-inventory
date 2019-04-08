@extends('layout.main_layout')

@section('main-content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">Stock Form</div>
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">Add Stock Code</h3>
                                </div>
                                <hr>
                                <form action="post_add" method="post" novalidate="novalidate">
                                    @csrf

                                    <div class="form-group">
                                        <label for="code" class="control-label mb-1">Code</label>
                                        <input id="code" name="code" type="text" class="form-control"
                                               aria-required="true" aria-invalid="false">
                                    </div>
                                    <div class="form-group">
                                        <label for="description" class="control-label mb-1">Description</label>
                                        <input id="description" name="description" type="text" class="form-control"
                                               aria-required="true" aria-invalid="false">
                                    </div>
                                    <div class="form-group">
                                        <label for="price" class="control-label mb-1">Pricing</label>
                                        <input id="price" name="price" type="number" class="form-control"
                                               aria-required="true" aria-invalid="false">
                                    </div>
                                    <div class="form-group">
                                        <label for="moq" class="control-label mb-1">MOQ</label>
                                        <input id="moq" name="moq" type="number" class="form-control"
                                               aria-required="true" aria-invalid="false">
                                    </div>
                                    <div class="form-group">
                                        <label for="vendor_id" class=" form-control-label">Select Vendor</label>
                                        <select name="vendor_id" id="vendor_id"
                                                class="form-control-lg form-control">
                                            <option value="0">Please select</option>
                                            @foreach($vendors as $vendor)
                                                <option value="{{$vendor->ID}}">{{$vendor->CODE}}
                                                    - {{$vendor->COMPANY_NAME}}</option>
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