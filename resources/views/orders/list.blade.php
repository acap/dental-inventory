{{--this extended with boothstrap -> view/layout--}}
@extends('layout.main_layout')

{{--section is a part of a page in layout call main layout which combine of all the layout and told laravel to yield--}}
@section('main-content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">

                {{--this is the button on the header at order list page--}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">Order</h2>
                            <button class="au-btn au-btn-icon au-btn--blue" onclick="addOrder()">
                                <i class="zmdi zmdi-plus"></i>add order
                            </button>
                        </div>
                    </div>
                </div>
                {{--using div which in row condition--}}
                {{--this is the table based on table class--}}
                {{--using looping foreach--}}
                <div class="row">
                    <div class="col-md-12 m-t-25">
                        <div class="table-responsive table--no-card m-b-30">
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                                <tr>
                                    <th>ORDER NUMBER</th>
                                    <th>NAME</th>
                                    <th>TOTAL AMOUNT</th>
                                    <th>DATE</th>
                                    <th>STATUS</th>
                                </tr>
                                </thead>

                                {{--this is looping the data and why we use loop to make the data come out--}}
                                @foreach ($result as $order)
                                    <tr class='clickable-row' data-href='{{url('/orders/detail/' .$order->ORDER_NO)}}'>
                                        <td>
                                            {{$order->ORDER_NO}}
                                        </td>
                                        <td>
                                            {{$order->client->NAME}}
                                        </td>
                                        <td>
                                            {{$order->TOTAL_AMOUNT}}
                                        </td>
                                        <td datatype="d-m-y">
                                            {{$order->DATE_DELIVERY}}
                                        </td>
                                        <td>
                                            {{$order->STATUS}}
                                        </td>
                                    </tr>
                                @endforeach
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

        jQuery(document).ready(function($) {
            $(".clickable-row").click(function() {
                window.location = $(this).data("href");
            });
        });

        function addOrder() {
            window.location.assign('{{url('/orders/add')}}');
        }
    </script>
@endsection

