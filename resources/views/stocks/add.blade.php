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
                                    <h3 class="text-center title-2">Add Stock</h3>
                                </div>
                                <hr>
                                <form action="post_add" method="post" novalidate="novalidate">
                                    @csrf
                                    <div class="form-group">
                                        <label for="stock_code_id" class=" form-control-label">Select Stock Code</label>
                                        <select name="stock_code_id" id="stock_code_id"
                                                class="form-control-lg form-control">
                                            <option value="0">Please select</option>
                                            @foreach($stockCodes as $stockCode)
                                                <option value="{{$stockCode->ID}}">{{$stockCode->CODE}} - {{$stockCode->DESCRIPTION}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="quantity" class="control-label mb-1">Quantity</label>
                                        <input id="quantity" name="quantity" type="text" class="form-control"
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
