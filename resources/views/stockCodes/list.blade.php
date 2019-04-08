@extends('layout.main_layout')

@section('main-content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">Stock Codes</h2>
                            <button class="au-btn au-btn-icon au-btn--blue" onclick="addStockCode()">
                                <i class="zmdi zmdi-plus"></i>add stock code
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
                                    <th>Price</th>
                                    <th>MOQ</th>
                                    <th>Vendor</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($stockCodeList as $stockCode)
                                    <tr class='clickable-row'
                                        data-href='{{url('/stockCodes/edit/' .$stockCode->CODE)}}'>
                                        <td>{{$stockCode -> ID}}</td>
                                        <td>{{$stockCode -> CODE}}</td>
                                        <td>{{$stockCode -> DESCRIPTION}}</td>
                                        <td>{{$stockCode -> PRICE}}</td>
                                        <td>{{$stockCode -> MOQ}}</td>
                                        <td>{{$stockCode -> vendor -> COMPANY_NAME}}</td>
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
    </div>
    </div>
    </div>
    </div>


@endsection
@section('main-script')
    <script>

        jQuery(document).ready(function ($) {
            $(".clickable-row").click(function () {
                window.location = $(this).data("href");
            });
        });

        function addStockCode() {
            window.location.assign('{{url('/stockCodes/add')}}');
        }
    </script>
@endsection
