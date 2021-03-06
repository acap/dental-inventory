@extends('layout.main_layout')

@section('main-content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">

                    <div class=" col-md-4 col-sm-12 well pull-right-lg" style="border:0px solid">
                        <p class="well" style="padding:10px; margin-bottom:2px;">
                            <span class="glyphicon glyphicon-calendar"></span>  Calendar
                        </p>
                        <div class="col-md-12" style="padding:0px;">
                            <br>
                            <table class="table table-bordered table-style table-responsive">
                                <tr>
                                    <th colspan="2"><a href="?ym=<?php echo $prev; ?>"><span
                                                class="glyphicon glyphicon-chevron-left"></span></a></th>
                                    <th colspan="3"> Jan - 2017<!--?php echo $html_title; ?--></th>
                                    <th colspan="2"><a href="?ym=<?php echo $next; ?>"><span
                                                class="glyphicon glyphicon-chevron-right"></span></a></th>
                                </tr>
                                <tr>
                                    <th>S</th>
                                    <th>M</th>
                                    <th>T</th>
                                    <th>W</th>
                                    <th>T</th>
                                    <th>F</th>
                                    <th>S</th>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>2</td>
                                    <td>3</td>
                                    <td>4</td>
                                    <td>5</td>
                                    <td>6</td>
                                    <td>7</td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>9</td>
                                    <td>10</td>
                                    <td>11</td>
                                    <td class="today">12</td>
                                    <td>13</td>
                                    <td>14</td>
                                </tr>
                                <tr>
                                    <td>15</td>
                                    <td>16</td>
                                    <td>17</td>
                                    <td>18</td>
                                    <td>19</td>
                                    <td>20</td>
                                    <td>21</td>
                                </tr>
                                <tr>
                                    <td>22</td>
                                    <td>23</td>
                                    <td>24</td>
                                    <td>25</td>
                                    <td>26</td>
                                    <td>27</td>
                                    <td>28</td>
                                </tr>
                                <tr>
                                    <td>29</td>
                                    <td>30</td>
                                    <td>31</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>

                                <!--?php
                                  foreach ($weeks as $week) {
                                    echo $week;
                                  };
                                ?-->
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
