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
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 m-t-25">
                        <div class="table-responsive table--no-card m-b-30">
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                                <tr>
                                    <th>NAME</th>
                                    <th>IC NUMBER</th>
                                    <th>DETAIL</th>
                                </tr>
                                </thead>

                                //this is looping the data and why we use loop to make the data come out
                                @foreach ($clientList as $client)
                                    <tr>
                                        <td>
                                            {{$client ->NAME}}
                                        </td>
                                        <td>
                                            <a href="{{url('clients/detail/'.$client->IC_NO)}}">
                                                {{$client->IC_NO}}
                                            </a>
                                        </td>
                                        <td>
                                            <button class="au-btn au-btn-icon au-btn--blue2" onclick="viewDetail()"><i class="zmdi"></i>detail</button>
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

    <script>
        function addClient() {
            window.location.assign('/dentalInventory/public/clients/add');
        }
//        function viewDetail() {
//            window.location.assign('/dentalInventory/public/clients/detail');
//        }
    </script>


@endsection