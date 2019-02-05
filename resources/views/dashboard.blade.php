@extends('layout.main_layout')

@section('main-content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">overview</h2>
                            <button class="au-btn au-btn-icon au-btn--blue" onclick="addOrder()">
                                <i class="zmdi zmdi-plus"></i>add order
                            </button>
                            <button class="au-btn au-btn-icon au-btn--blue" onclick="addStock()">
                                <i class="zmdi zmdi-plus"></i>add stock
                            </button>
                            <button class="au-btn au-btn-icon au-btn--blue" onclick="addClient()">
                                <i class="zmdi zmdi-plus"></i>add client
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row m-t-50">

                    @foreach($dashboard as $dash)
                        <div class="col-sm-12 col-lg-6">
                            <div class="overview-item overview-item--c1">
                                <div class="overview__inner">
                                    <div class="overview-box clearfix">
                                        <div class="icon">
                                            <i class="zmdi zmdi-account-o"></i>
                                        </div>
                                        <div class="text">
                                            <h2>{{$dash['count']}}</h2>
                                            <span>{{$dash['title']}}</span>
                                        </div>
                                    </div>
                                    <div class="overview-chart">
                                        <canvas id="widgetChart1"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script>
        function addOrder() {
            window.location.assign('/dentalInventory/public/orders/add');
        }
        function addStock() {
            window.location.assign('/dentalInventory/public/stocks/add');
        }
        function addClient() {
            window.location.assign('/dentalInventory/public/clients/add');
        }
    </script>
@endsection