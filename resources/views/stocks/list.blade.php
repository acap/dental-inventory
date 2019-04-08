@extends('layout.main_layout')

@section('main-content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">Stocks</h2>
                            <button class="au-btn au-btn-icon au-btn--blue" onclick="addStock()">
                                <i class="zmdi zmdi-plus"></i>add stock
                            </button>
                            <button class="au-btn au-btn-icon au-btn--blue" onclick="downloadStock()">
                                <i class="zmdi zmdi-plus"></i>Download report
                            </button>
                            <button class="au-btn au-btn-icon au-btn--blue" onclick="downloadMoq()">
                                <i class="zmdi zmdi-plus"></i>Download MOQ
                            </button>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 m-t-25">
                        <div class="table-responsive table--no-card m-b-30">
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                                <tr>
                                    <th>Stock</th>
                                    <th>Quantity</th>
                                    <th>MOQ</th>
                                    <th>Per Unit</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($stockList as $stock)
                                    <tr>
                                        <td>{{$stock->stockCode->CODE}} - {{$stock->stockCode->DESCRIPTION}} </td>
                                        <td>{{$stock->QUANTITY}}</td>
                                        <td>{{$stock->stockCode->MOQ}}</td>
                                        <td>{{$stock->stockCode->PRICE}}</td>
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

@endsection

@section('main-script')
    <script>
        function addStock() {
            window.location.assign('{{url('/stocks/add')}}');
        }

        function downloadStock() {
            window.location.assign('{{url('/stocks/download')}}');
        }
        function downloadMoq() {
            window.location.assign('{{url('/stocks/download_moq')}}');
        }
    </script>
@endsection
