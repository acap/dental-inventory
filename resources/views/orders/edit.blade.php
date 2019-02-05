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
                                    <h3 class="text-center title-2">Edit Order</h3>
                                </div>
                                <hr>
                                <form action="../post_edit" method="post" novalidate="novalidate">
                                    @csrf
                                    <div class="form-group">
                                        <label for="order_no" class="control-label mb-1">Order No</label>
                                        <input id="order_no" name="order_no" type="text"
                                               value="{{$order->ORDER_NO}}"
                                               class="form-control"
                                               aria-required="true" aria-invalid="false">
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="control-label mb-1">Name</label>
                                        <input id="name" name="name" type="text"
                                               value="{{$order->NAME}}"
                                               class="form-control"
                                               aria-required="true" aria-invalid="false">
                                    </div>
                                    <div class="form-group">
                                        <label for="total_amount" class="control-label mb-1">Total Amount</label>
                                        <input id="total_amount" name="total_amount" type="text"
                                               value="{{$order->TOTAL_AMOUNT}}"
                                               class="form-control"
                                               aria-required="true" aria-invalid="false">
                                    </div>

                                    <div class="form-group">
                                        <label for="date_delivery" class="control-label mb-1">Date delivery</label>
                                        <input id="date_delivery" name="date_delivery" class="form-control cc-exp"
                                               value="{{$order->DATE_DELIVERY}}"
                                               data-val="true"
                                               placeholder="DD/MM/YY">
                                    </div>
                                    <div class="form-group">
                                        <label for="status" class=" form-control-label">Select Status</label>
                                        <select name="status" id="status"
                                                class="form-control-lg form-control">
                                            <option value="0">Please select</option>
                                            <option value="1">NEW</option>
                                            <option value="2">PROCESSING</option>
                                            <option value="3">DONE</option>
                                            <option value="4">CANCEL</option>
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