@extends('layout.main_layout')

@section('main-content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">Order</h2>
                            <button class="au-btn au-btn-icon au-btn--blue" onclick="addStockCode()">
                                <i class="zmdi zmdi-plus"></i>add stock Code
                            </button>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 m-t-25">
                        <div class="card">
                            <div class="card-header">Order</div>
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">Order List</h3>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="links">
                                            <table class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Stock</th>
                                                    <th>Quantity</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($stockCodeList as $stockCode)
                                                    <tr>
                                                        <td>{{$stockCode -> ID}}</td>
                                                        <td>{{$stockCode -> CODE}}</td>
                                                        <td>{{$stockCode -> DESCRIPTION}}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function addStockCode(){
            window.location.assign('/dentalInventory/public/stockCodes/add');
        }
    </script>
@endsection