@extends('layout.main_layout')

@section('main-content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">

                <div class="row ">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">Detail</h2>
                            {{--<button class="au-btn au-btn-icon au-btn--blue" onclick="listOrder()">--}}
                                {{--<i class="zmdi zmdi-toys"></i>list order--}}
                            {{--</button>--}}
                            {{--<button class="au-btn au-btn-icon au-btn--blue" onclick="editOrder('{{$order->ORDER_NO}}')">--}}
                                {{--<i class="zmdi zmdi-edit"></i>edit order--}}
                            {{--</button>--}}
                            {{--<button class="au-btn au-btn-icon au-btn--blue" onclick="addOrder()">--}}
                                {{--<i class="zmdi zmdi-plus"></i>add order--}}
                            {{--</button>--}}
                        </div>
                    </div>
                </div>

                <div class="row m-t-25">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">Detail Form</div>
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">Add Detail {{$client->IC_NO}}</h3>
                                </div>
                                <hr>
                                {{$client->NAME}}<br />
                                {{$client->IC_NO}}<br />
                                {{$client->ADDRESS}}<br />
                                {{$client->PHONE_NO}}
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    // yang nie aku close dlu
    {{--<script>--}}
        {{--function listOrder(){--}}
            {{--window.location.assign('/dentalInventory/public/orders/list');--}}
        {{--}--}}
        {{--function addOrder(){--}}
            {{--window.location.assign('/dentalInventory/public/orders/add');--}}
        {{--}--}}
        {{--function editOrder(orderNo){--}}
            {{--window.location.assign('/dentalInventory/public/orders/edit/' + orderNo);--}}
        {{--}--}}
    {{--</script>--}}

@endsection

