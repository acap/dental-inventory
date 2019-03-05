@extends('layout.main_layout')

@section('main-content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">stockCode Form</div>
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">Edit stockCode</h3>
                                </div>
                                <hr>
                                <form action="{{url('clients/post_edit')}}" method="post" novalidate="novalidate">
                                    @csrf
                                    <div class="form-group">
                                        <label for="code" class="control-label mb-1">Code</label>
                                        <input id="code" name="code" type="text"
                                               value="{{$stockCode->CODE}}"
                                               class="form-control"
                                               aria-required="true" aria-invalid="false" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="description" class="control-label mb-1">Description</label>
                                        <input id="description" name="description" type="text"
                                               value="{{$stockCode->DESCRIPTION}}"
                                               class="form-control"
                                               aria-required="true" aria-invalid="false">
                                    </div>
                                    <div class="form-group">
                                        <label for="price" class="control-label mb-1">Total Amount</label>
                                        <input id="price" name="price" type="text"
                                               value="{{$stockCode->PRICE}}"
                                               class="form-control"
                                               aria-required="true" aria-invalid="false">
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