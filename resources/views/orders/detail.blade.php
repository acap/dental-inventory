@extends('layout.main_layout')

@section('main-content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">

                <div class="row ">
                    <div class="col-md-6">
                        <div class="overview-wrap">
                            <h2 class="title-1">Order</h2>
                        </div>
                    </div>
                    <div class="col-md-6">
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

                <div class="row m-t-25">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">Order #{{$order->ORDER_NO}}</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">Name</div>
                                    <div class="col-md-9">{{$order->NAME}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">Description</div>
                                    <div class="col-md-9">{{$order->DESCRIPTION}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">Description</div>
                                    <div class="col-md-9">{{$order->TOTAL_AMOUNT}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">Delivery</div>
                                    <div class="col-md-9">{{$order->DATE_DELIVERY}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">Status</div>
                                    <div class="col-md-9">{{$order->STATUS}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row m-t-25">
                    <div class="col-lg-12">
                        <div class="table-data__tool">
                            <div class="table-data__tool-left">
                                <h2 class="title-1">Order Item</h2>
                            </div>
                            <div class="table-data__tool-right">
                                <button class="au-btn au-btn-icon au-btn--green au-btn--small"
                                        data-toggle="modal"
                                        data-target="#orderItemModal">
                                    <i class="zmdi zmdi-plus"></i>add item
                                </button>
                            </div>
                        </div>
                        <div class="table-responsive table--no-card m-b-40">
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                                <tr>
                                    <th>Stock Code</th>
                                    <th>Quantity</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orderItems as $orderItem)
                                    <tr>
                                        <td>{{$orderItem->STOCK_CODE_ID}}</td>
                                        <td>{{$orderItem->QUANTITY}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--order item modal--}}
    <div class="modal fade" id="orderItemModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <form action="{{url('/orders/post_add_item')}}/{{$order->ORDER_NO}}" method="post" novalidate="novalidate">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="largeModalLabel">Order Item</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="stock_code_id" class=" form-control-label">Select Stock Code</label>
                            <select name="stock_code_id" id="stock_code_id"
                                    class="form-control-lg form-control">
                                <option value="0">Please select</option>
                                @foreach($stockCodes as $stockCode)
                                    <option value="{{$stockCode->ID}}">{{$stockCode->CODE}}
                                        -{{$stockCode->DESCRIPTION}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="quantity" class="control-label mb-1">Quantity</label>
                            <input id="quantity" name="quantity" type="text" class="form-control"
                                   aria-required="true" aria-invalid="false">
                        </div>
                        <div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        function listOrder() {
            window.location.assign('{{url('orders/list')}}');
        }

        function addOrder() {
            window.location.assign('{{url('orders/add')}}');
        }

        function editOrder(orderNo) {
            window.location.assign('{{url('orders/edit')}}/' + orderNo);
        }

        function addOrderItem(orderNo) {
        }
    </script>

@endsection

