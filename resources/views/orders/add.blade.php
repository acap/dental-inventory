@extends('layout.main_layout')

@section('main-content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">Order Form</div>
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">Add Order</h3>
                                </div>
                                <hr>
                                <form action="post_add" method="post" novalidate="novalidate">
                                    @csrf
                                    <div class="form-group">
                                        <label for="order_no" class="control-label mb-1">Order No</label>
                                        <input id="order_no" name="order_no" type="text" class="form-control"
                                               aria-required="true" aria-invalid="false">
                                    </div>
                                    <div class="form-group">
                                        <label for="client_id" class=" form-control-label">Select Client</label>
                                        <select name="client_id" id="client_id"
                                                class="form-control-lg form-control">
                                            <option value="0">Please select</option>
                                            @foreach($clients as $client)
                                                <option value="{{$client->ID}}">{{$client->IC_NO}} - {{$client->NAME}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="date_delivery" class="control-label mb-1">Date delivery</label>
                                        <input id="date_delivery" name="date_delivery" class="form-control cc-exp"
                                               value="" data-val="true"
                                               placeholder="DD/MM/YY">
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
