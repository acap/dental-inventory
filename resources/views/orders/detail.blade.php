@extends('layout.main_layout')

@section('main-content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">

                <div class="row ">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">Order</h2>
                            <button class="au-btn au-btn-icon au-btn--blue" onclick="listOrder()">
                                <i class="zmdi zmdi-toys"></i>list order
                            </button>
                            <button class="au-btn au-btn-icon au-btn--blue" onclick="editOrder('{{$order->ORDER_NO}}')">
                                <i class="zmdi zmdi-edit"></i>edit order
                            </button>
                            <button class="au-btn au-btn-icon au-btn--blue" onclick="addOrder()">
                                <i class="zmdi zmdi-plus"></i>add order
                            </button>
                        </div>
                    </div>
                </div>

                <div class="row m-t-25">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">Order Form</div>
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">Add Order {{$order->ORDER_NO}}</h3>
                                </div>
                                <hr>
                                {{$order->NAME}}
                                {{$order->DESCRIPTION}}
                                {{$order->TOTAL_AMOUNT}}
                                {{$order->DATE_DELIVERY}}
                                {{$order->STATUS}}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row m-t-25">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">Stock</div>
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">Stock List</h3>
                                </div>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Stock Code</th>
                                        <th>Quantity</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>G300 - False teeth</td>
                                            <td>2</td>
                                        </tr>
                                        <tr>
                                            <td>G301 - Screw</td>
                                            <td>4</td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <script>
        function listOrder(){
            window.location.assign('/dentalInventory/public/orders/list');
        }
        function addOrder(){
            window.location.assign('/dentalInventory/public/orders/add');
        }
        function editOrder(orderNo){
            window.location.assign('/dentalInventory/public/orders/edit/' + orderNo);
        }
    </script>

@endsection

