@extends('layout.main_layout')

@section('main-content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">LIST OF VENDOR</h2>
                            <button class="au-btn au-btn-icon au-btn--blue" onclick="addVendor()">
                                <i class="zmdi zmdi-plus"></i>add vendor
                            </button>
                            {{--<button class="au-btn au-btn-icon au-btn--blue" onclick="downloadClient()">--}}
                                {{--<i class="zmdi zmdi-plus"></i>Download list client--}}
                            {{--</button>--}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 m-t-25">
                        <div class="table-responsive table--no-card m-b-40">
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                                <tr>
                                    <th>COMPANY NAME</th>
                                    <th>CONTACT PERSON NAME</th>
                                    <th>PHONE NO</th>
                                </tr>
                                </thead>

                                {{--this is looping the data and why we use loop to make the data come out--}}
                                {{--this table able to click on the row using--}}
                                {{--guna relationship untuk other table and table--}}
                                {{--class='clickable-row' data-href='{{url('/clients/detail/' .$client->IC_NO)}}'--}}
                                @foreach ($vendorList as $vendor)
                                    <tr class='clickable-row' data-href='{{url('/vendors/detail/'. $vendor->ID)}}'>
                                        <td>
                                            {{$vendor ->COMPANY_NAME}}
                                        </td>
                                        <td>
                                            {{$vendor->CONTACT_PERSON_NAME}}
                                        </td>
                                        <td>
                                            {{$vendor->PHONE_NO}}
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

        jQuery(document).ready(function ($) {
            $(".clickable-row").click(function () {
                window.location = $(this).data("href");
            });
        });

        function addVendor() {
            window.location.assign('{{url('/vendors/add')}}');
        }
        {{--function downloadClient() {--}}
            {{--window.location.assign('{{url('/clients/download')}}');--}}
        {{--}--}}
    </script>
@endsection

