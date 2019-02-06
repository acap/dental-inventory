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
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 m-t-25">
                        <div class="table-responsive table--no-card m-b-30">
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Stock</th>
                                    <th>Quantity</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($stockList as $stock)
                                    <tr>
                                        <td>{{$stock -> ID}}</td>
                                        <td>{{$stock -> STOCK_CODE_ID}}</td>
                                        <td>{{$stock -> QUANTITY}}</td>
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
    </script>
@endsection
