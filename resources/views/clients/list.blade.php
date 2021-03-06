@extends('layout.main_layout')

@section('main-content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">LIST OF CLIENT</h2>
                            <button class="au-btn au-btn-icon au-btn--blue" onclick="addClient()">
                                <i class="zmdi zmdi-plus"></i>add client
                            </button>
                            <button class="au-btn au-btn-icon au-btn--blue" onclick="downloadClient()">
                                <i class="zmdi zmdi-plus"></i>Download list client
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 m-t-25">
                        <div class="table-responsive table--no-card m-b-40">
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                                <tr>
                                    <th>NAME</th>
                                    <th>IC NUMBER</th>
                                    <th>PHONE NO</th>
                                    <th>STATE</th>
                                </tr>
                                </thead>

                                {{--this is looping the data and why we use loop to make the data come out--}}
                                {{--this table able to click on the row using  --}}
                                {{--guna relationship untuk other table and table  --}}
                                @foreach ($clientList as $client)
                                    <tr class='clickable-row' data-href='{{url('/clients/detail/' .$client->IC_NO)}}'>
                                        <td>
                                            {{$client ->NAME}}
                                        </td>
                                        <td>
                                            {{$client->IC_NO}}
                                        </td>
                                        <td>
                                            {{$client->PHONE_NO}}
                                        </td>
                                        <td>
                                            {{$client ->stateCode-> NAME }}
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

        function addClient() {
            window.location.assign('{{url('/clients/add')}}');
        }
        function downloadClient() {
            window.location.assign('{{url('/clients/download')}}');
        }
    </script>
@endsection

