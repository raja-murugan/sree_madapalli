@extends('layouts.login')

@section('content')
@hasrole('Super-Admin|Admin')
<div id="layout-wrapper">

    @include('layouts.general.left-bar')

    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Dashboard - {{ date('d.m.Y', strtotime($today)) }}</h4>
                        <div class="page-title-right">
                            <div style="display: flex;">

                                <div style="margin-right: 10px;" hidden>
                                    <input type="date" class="form-control" name="dashboarddate" id="dashboarddate" placeholder="Enter Your " required value="{{ $today }}">
                                </div>
                                <div style="margin-right: 10px;" hidden>
                                    <button type="button" class="btn btn-success w-md dashboard_search">Search</button>
                                </div>



                                @if (count($opendate) >= 1)
                                @else
                                <div>
                                    <button style="margin-right: 10px;" type="button" class="btn btn-success w-md" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Open Account</button>

                                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        @include('pages.backend.accountopen.create')
                                    </div>
                                </div>
                                @endif
                                @if (count($determinationdate) >= 1)
                                @else
                                <div>
                                    <button style="margin-right: 10px;" type="button" class="btn btn-success w-md" data-bs-toggle="modal" data-bs-target="#staticBackdropdeter">Denomination</button>

                                    <div class="modal fade" id="staticBackdropdeter" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        @include('pages.backend.determination.create')
                                    </div>
                                </div>
                                @endif
                                @if (count($closedate) >= 1)
                                @else
                                <div>
                                    <button type="button" class="btn btn-success w-md" data-bs-toggle="modal" data-bs-target="#staticBackdropclose">Close Account</button>

                                    <div class="modal fade" id="staticBackdropclose" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        @include('pages.backend.accountclose.create')
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @if (\Session::has('add'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="mdi mdi-check-all me-2"></i>
                    {!! \Session::get('add') !!}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if (\Session::has('update'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="mdi mdi-bullseye-arrow me-2"></i>
                    {!! \Session::get('update') !!}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <div class="row" style="font-weight: bold;">
                    <div class="col-xl-6 col-12" style="padding-right: 10px;">
                        <div class="card" style="background-color: #ACDDDE;">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table align-middle table-nowrap mb-0">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">Cash on Hand</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">₹ {{ $total_2000 + $total_500 + $total_200 + $total_100 + $total_50 + $total_20 + $total_10 + $total_5 + $total_2 + $total_1 }}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">Pending Bills</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">₹ {{ $breakfast_data_ps_pending + $lunch_data_ps_pending + $dinner_data_ps_pending }}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">G Pay</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">₹ {{ $g_pay }}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">G-Pay Business</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">₹ {{ $g_pay_business }}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">Phone Pe</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">₹ {{ $phone_pay }}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">Card</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">₹ {{ $card }}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">Paytm</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">₹ {{ $paytm }}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">Other Cash</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">₹ {{ $payment + $other_case }}</td>
                                            </tr>
                                            <tr style="color: red;">
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">Total</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">₹ {{ ($total_2000 + $total_500 + $total_200 + $total_100 + $total_50 + $total_20 + $total_10 + $total_5 + $total_2 + $total_1) + $g_pay + $phone_pay + $card + $breakfast_data_ps_pending + $lunch_data_ps_pending + $dinner_data_ps_pending + $g_pay_business + $paytm + $payment + $other_case }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card" style="background-color: #CAF1DE;">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table align-middle table-nowrap mb-0">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">Opening</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">₹ {{ $opening }}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">Sales</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">₹ {{ $sales_amount }}</td>
                                            </tr>
                                            <tr style="color: red;">
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">Total</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">₹ {{ $opening + $sales_amount }}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">Expense</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">₹ {{ $expense }}</td>
                                            </tr>
                                            <tr style="color: red;">
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">Total</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">₹ {{ (($opening + $sales_amount) - $expense) }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card" style="background-color: #E1F8DC;">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table align-middle table-nowrap mb-0">
                                        <tr style="color: red;">
                                            <th scope="col" style="font-weight: bold;font-size: 16px !important;">Over All</th>
                                            <th scope="col" style="font-weight: bold;font-size: 16px !important;">₹ {{ (($total_2000 + $total_500 + $total_200 + $total_100 + $total_50 + $total_20 + $total_10 + $total_5 + $total_2 + $total_1) + $g_pay + $phone_pay + $card + $breakfast_data_ps_pending + $lunch_data_ps_pending + $dinner_data_ps_pending + $g_pay_business + $paytm + $payment + $other_case) - (($opening + $sales_amount) - $expense) }}</th>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-12" style="padding-left: 10px;">
                        <div class="card" style="background-color: #FEF8DD;">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table align-middle table-nowrap mb-0">
                                        <tbody id="current_date_denomination">
                                            @foreach ($determination as $determinations)
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">₹ 2000</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">X</td>
                                                <td style="font-weight: bold;font-size: 16px !important;">{{ $determinations->count_2000 }}</td>
                                                <td style="font-weight: bold;font-size: 16px !important;">₹ {{ $determinations->total_2000 }}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">₹ 500</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">X</td>
                                                <td style="font-weight: bold;font-size: 16px !important;">{{ $determinations->count_500 }}</td>
                                                <td style="font-weight: bold;font-size: 16px !important;">₹ {{ $determinations->total_500 }}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">₹ 200</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">X</td>
                                                <td style="font-weight: bold;font-size: 16px !important;">{{ $determinations->count_200 }}</td>
                                                <td style="font-weight: bold;font-size: 16px !important;">₹ {{ $determinations->total_200 }}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">₹ 100</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">X</td>
                                                <td style="font-weight: bold;font-size: 16px !important;">{{ $determinations->count_100 }}</td>
                                                <td style="font-weight: bold;font-size: 16px !important;">₹ {{ $determinations->total_100 }}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">₹ 50</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">X</td>
                                                <td style="font-weight: bold;font-size: 16px !important;">{{ $determinations->count_50 }}</td>
                                                <td style="font-weight: bold;font-size: 16px !important;">₹ {{ $determinations->total_50 }}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">₹ 20</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">X</td>
                                                <td style="font-weight: bold;font-size: 16px !important;">{{ $determinations->count_20 }}</td>
                                                <td style="font-weight: bold;font-size: 16px !important;">₹ {{ $determinations->total_20 }}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">₹ 10</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">X</td>
                                                <td style="font-weight: bold;font-size: 16px !important;">{{ $determinations->count_10 }}</td>
                                                <td style="font-weight: bold;font-size: 16px !important;">₹ {{ $determinations->total_10 }}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">₹ 5</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">X</td>
                                                <td style="font-weight: bold;font-size: 16px !important;">{{ $determinations->count_5 }}</td>
                                                <td style="font-weight: bold;font-size: 16px !important;">₹ {{ $determinations->total_5 }}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">₹ 2</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">X</td>
                                                <td style="font-weight: bold;font-size: 16px !important;">{{ $determinations->count_2 }}</td>
                                                <td style="font-weight: bold;font-size: 16px !important;">₹ {{ $determinations->total_2 }}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">₹ 1</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">X</td>
                                                <td style="font-weight: bold;font-size: 16px !important;">{{ $determinations->count_1 }}</td>
                                                <td style="font-weight: bold;font-size: 16px !important;">₹ {{ $determinations->total_1 }}</td>
                                            </tr>
                                            <tr style="color: red;">
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">Total</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;"></td>
                                                <td style="font-weight: bold;font-size: 16px !important;"></td>
                                                <td style="font-weight: bold;font-size: 16px !important;">₹ {{ $determinations->total_2000 + $determinations->total_500 + $determinations->total_200 + $determinations->total_100 + $determinations->total_50 + $determinations->total_20 + $determinations->total_10 + $determinations->total_5 + $determinations->total_2 + $determinations->total_1 }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>

                                        <tbody id="filter_date_denomination" style="display:none">
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">2000</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">X</td>
                                                <td style="font-weight: bold;font-size: 16px !important;" class="count2000"></td>
                                                <td style="font-weight: bold;font-size: 16px !important;" class="total2000"></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">500</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">X</td>
                                                <td style="font-weight: bold;font-size: 16px !important;" class="count500"></td>
                                                <td style="font-weight: bold;font-size: 16px !important;" class="total500"></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">200</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">X</td>
                                                <td style="font-weight: bold;font-size: 16px !important;" class="count200"></td>
                                                <td style="font-weight: bold;font-size: 16px !important;" class="total200"></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">100</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">X</td>
                                                <td style="font-weight: bold;font-size: 16px !important;" class="count100"></td>
                                                <td style="font-weight: bold;font-size: 16px !important;" class="total100"></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">50</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">X</td>
                                                <td style="font-weight: bold;font-size: 16px !important;" class="count50"></td>
                                                <td style="font-weight: bold;font-size: 16px !important;" class="total50"></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">20</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">X</td>
                                                <td style="font-weight: bold;font-size: 16px !important;" class="count20"></td>
                                                <td style="font-weight: bold;font-size: 16px !important;" class="total20"></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">10</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">X</td>
                                                <td style="font-weight: bold;font-size: 16px !important;" class="count10"></td>
                                                <td style="font-weight: bold;font-size: 16px !important;" class="total10"></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">5</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">X</td>
                                                <td style="font-weight: bold;font-size: 16px !important;" class="count5"></td>
                                                <td style="font-weight: bold;font-size: 16px !important;" class="total5"></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">2</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">X</td>
                                                <td style="font-weight: bold;font-size: 16px !important;" class="count2"></td>
                                                <td style="font-weight: bold;font-size: 16px !important;" class="total2"></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">1</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;">X</td>
                                                <td style="font-weight: bold;font-size: 16px !important;" class="count1"></td>
                                                <td style="font-weight: bold;font-size: 16px !important;" class="total1"></td>
                                            </tr>
                                            <tr style="color: red;">
                                                <td>
                                                    <h5 class="font-size-13 text-truncate mb-1" style="font-weight: bold;font-size: 16px !important;">Total</h5>
                                                </td>
                                                <td style="font-weight: bold;font-size: 16px !important;"></td>
                                                <td style="font-weight: bold;font-size: 16px !important;"></td>
                                                <td style="font-weight: bold;font-size: 16px !important;" class="all_amount_count"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        @include('layouts.general.footer')

<script>
$(document.body).on("click", ".dashboard_search", function() {
    var dashboarddate = $('#dashboarddate').val();


    if (dashboarddate != "") {


        $.ajax({
            url: '/getDashboardData/'
            , type: 'get'
            , data: {
                _token: "{{ csrf_token() }}"
                , dashboarddate: dashboarddate
            }
            , dataType: 'json'
            , success: function(response) {

                    //$('.cash_on_hand').empty();
                    $('#filter_array').html('');


                    console.log(response);
                    var output = response.length;

                    for (var i = 0; i < output; i++) {
                        $('.cash_on_hand').html(response[i].cashonhand);
                        $('.pending_bill').html(response[i].pendingBill);
                        $('.gpay').html(response[i].g_pay);
                        $('.gpaybusiness').html(response[i].g_pay_business);
                        $('.phonepay').html(response[i].phone_pay);
                        $('.debitorcredit_card').html(response[i].debitorcredit_card);
                        $('.other_cash').html(response[i].otherCash);
                        $('.total_amount').html(response[i].totalAmount);
                        $('.opening').html(response[i].opening);
                        $('.sales_amount').html(response[i].sales_amount);
                        $('.totalopening_sales').html(response[i].totalopening_sales);
                        $('.expenseamt').html(response[i].expense);
                        $('.p_total').html(response[i].p_total);
                        $('.overall_amt').html(response[i].overall_amt);

                    }

                }
        });


        $.ajax({
            url: '/getDenomination/'
            , type: 'get'
            , data: {
                _token: "{{ csrf_token() }}"
                , dashboarddate: dashboarddate
            }
            , dataType: 'json'
            , success: function(response) {


                $('#current_date_denomination').empty();

                    console.log(response);
                    var output = response.length;

                    for (var i = 0; i < output; i++) {
                        $('.count2000').html(response[i].count2000);
                        $('.total_2000').html(response[i].total_2000);
                        $('.count500').html(response[i].count500);
                        $('.total_500').html(response[i].total_500);
                        $('.count200').html(response[i].count200);
                        $('.total_200').html(response[i].total_200);
                        $('.count100').html(response[i].count100);
                        $('.total_100').html(response[i].total_100);
                        $('.count50').html(response[i].count50);
                        $('.total_50').html(response[i].total_50);
                        $('.count20').html(response[i].count20);
                        $('.total_20').html(response[i].total_20);
                        $('.count10').html(response[i].count10);
                        $('.total_10').html(response[i].total_10);

                        $('.count5').html(response[i].count5);
                        $('.total_5').html(response[i].total_5);
                        $('.count2').html(response[i].count2);
                        $('.total_2').html(response[i].total_2);
                        $('.count1').html(response[i].count1);
                        $('.total_1').html(response[i].total_1);
                        $('.all_amount_count').html(response[i].all_amount_count);


                        $('#filter_date_denomination').show();
                    }

                }
        });

    }
});
</script>

    </div>

</div>
@endhasrole
@unlessrole('Super-Admin|Admin')
<div>
    <style>
        body {
            background-color: #141019;
            background: radial-gradient(at 50% -20%, #908392, #0d060e) fixed;
        }


        #handboy {
            animation: swing ease-in-out 1.3s infinite alternate;
            transform-origin: 98% 98%;
            transform-box: fill-box;

        }


        #girllight {
            animation: swing ease-in-out 1.3s infinite alternate;
            transform-origin: 0% 97%;
            transform-box: fill-box;
        }

        #hairgirl {
            animation: swinghair ease-in-out 1.3s infinite alternate;
            transform-origin: 60% 0%;
            transform-box: fill-box;

        }

        #zero {
            transform-origin: bottom;
            transform-box: fill-box;

        }

        /*************swing************/
        @keyframes swing {
            0% {
                transform: rotate(10deg);
            }

            100% {
                transform: rotate(-10deg);
            }
        }


        /*************swing hair************/
        @keyframes swinghair {
            0% {
                transform: rotate(6deg);
            }

            100% {
                transform: rotate(-6deg);
            }
        }

    </style>
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 mt-5 mb-5">
                    <svg width="100%" height="auto" viewBox="0 0 636 324" fill="none" xmlns="">
                        <g id="OBJECTS">
                            <g id="Group">
                                <path id="Vector" d="M101.3 255.2C101.3 255.2 111.1 272.6 181.8 280.5C252.5 288.4 288.2 314.9 333.1 322.8C378 330.7 433.6 278.5 481.8 286.5C530 294.4 588.2 264.2 592.8 255.2H101.3Z" fill="#2F1829" />
                                <path id="Vector_2" d="M611.9 251.7H601.4L140.8 251.8C140.8 251.8 136.1 248.1 128.9 241.8C125.8 239.1 122.2 235.9 118.3 232.3C116.9 231 115.4 229.6 113.9 228.2C100.2 215.3 83.6 198.2 70.1 180.1C55.9 161 45.1 140.6 44.8 122.6C44.8 122.2 44.8 121.8 44.8 121.4C45 104 48.4 85.1 56.9 67.7C61.9 57.5 68.5 47.8 77.3 39C100.1 16.2 137.1 0.300011 194.5 0.800011C261.4 1.30001 330.8 26.3 393.5 60.8C406.6 68 419.4 75.7 431.9 83.6C441.1 89.5 450.1 95.5 458.8 101.6C483.1 118.6 505.6 136.4 525.5 153.8C570.6 193.1 602.3 230.4 611.9 251.7Z" fill="url(#paint0_linear)" />
                                <path id="Vector_3" opacity="0.45" d="M611.9 251.7H601.4L140.8 251.8C140.8 251.8 136.1 248.1 128.9 241.8C125.8 239.1 122.2 235.9 118.3 232.3C116.9 231 115.4 229.6 113.9 228.2C100.2 215.3 83.6 198.2 70.1 180.1C55.9 161 45.1 140.6 44.8 122.6C50.5 119.6 63.9 113.5 75 116.3C89.5 119.9 92.6 137.2 92.6 137.2C92.6 137.2 103 128.8 113.9 132.8C124.8 136.8 126.5 148.4 126.5 148.4C126.5 148.4 139.4 141.8 150.9 144.6C162.5 147.4 171.8 158.6 159.4 165.9C147.1 173.1 133.3 167.5 132.9 167.4C133.1 167.6 137.9 174.2 129.1 182.2C120.1 190.4 154.6 197.5 154.6 197.5C154.6 197.5 155.9 175.1 179 177.6C202.1 180.1 220.8 192.6 220.8 192.6C220.8 192.6 222 158.3 240.5 152C259 145.7 268.5 165.9 268.5 165.9C268.5 165.9 309.5 139.4 323.4 164.1C337.3 188.8 337.9 193.5 337.9 193.5C337.9 193.5 349.8 128.5 387 131.5C424.2 134.5 431.1 160.3 430.5 162.9C429.9 165.5 441.2 146.2 452.4 156.7C463.6 167.2 470.1 181.8 470.1 181.8L529 174.9C529 174.9 523 163.3 525.4 153.8C570.6 193.1 602.3 230.4 611.9 251.7Z" fill="url(#paint1_linear)" />
                                <path id="Vector_4" d="M431.9 83.6H257.8C279.6 83.6 283.9 75.7 296.8 71.4C297.4 71.2 298 71 298.6 70.9C310.7 67.8 320.6 74.7 328.3 74.4C336.4 74.1 345.3 65.5 354.6 62.5C357.7 61.5 361 61.8 364.3 62.6C370.8 64.1 377.6 67.4 384.5 66.1C390.5 65 391 62.5 393.4 60.8C406.6 68 419.5 75.6 431.9 83.6Z" fill="url(#paint2_linear)" />
                                <path id="Vector_5" d="M206.5 67.7H56.9C61.8 57.7 68.3 48.1 76.9 39.4C77 39.3 77.2 39.1 77.3 39C80.8 38.3 84.6 37.8 88.7 37.6C112.4 36.6 117.4 54.5 117.4 54.5C117.4 54.5 123.6 46.2 134.8 50.2C146 54.2 142.1 59.1 151 61.8C152.2 62.1 153.4 62.2 154.7 62.1C163.2 61.4 173.9 52.1 183.4 55.5C194.4 59.4 187.3 67.7 206.5 67.7Z" fill="url(#paint3_linear)" />
                                <path id="Vector_6" d="M631.8 258.5H75.5C73.6 258.5 72.1 257 72.1 255.1C72.1 253.2 73.6 251.7 75.5 251.7H631.8C633.7 251.7 635.2 253.2 635.2 255.1C635.2 257 633.7 258.5 631.8 258.5Z" fill="#2F1829" />
                                <path id="Vector_7" opacity="0.25" d="M364.4 62.5C354.5 65 343.3 75.8 336 77.4C326.9 79.4 316.3 74.8 306 72.2C302.9 71.4 300.5 71 298.6 70.8C310.7 67.7 320.6 74.6 328.3 74.3C336.4 74 345.3 65.4 354.6 62.4C357.8 61.4 361 61.7 364.4 62.5Z" fill="white" />
                                <path id="Vector_8" opacity="0.25" d="M154.7 62.1C145.8 66.8 141.6 56.2 133.9 52.7C125 48.7 118.7 61.2 116.1 59C113.5 56.9 112.3 47.6 102.2 42.8C96.5 40.1 85.4 39.5 77 39.5C77.1 39.4 77.3 39.2 77.4 39.1C80.9 38.4 84.7 37.9 88.8 37.7C112.5 36.7 117.5 54.6 117.5 54.6C117.5 54.6 123.7 46.3 134.9 50.3C146.1 54.3 142.2 59.2 151.1 61.9C152.2 62.1 153.5 62.2 154.7 62.1Z" fill="white" />
                                <path id="Vector_9" d="M394.9 40.3C394.9 40.3 457.4 96.1 482.1 88.5C507 80.9 351.2 7.20001 394.9 40.3Z" fill="url(#paint4_linear)" />
                                <path id="Vector_10" d="M35 97C35 97 13.7 134.4 50.9 173.8C59.5 182.9 60.5 199.9 43.3 200.8C26.1 201.7 -0.599994 159.8 0.300006 126.1C1.30001 92.4 40.8 77.1 35 97Z" fill="url(#paint5_linear)" />
                                <path id="Vector_11" d="M461 295.7C461 295.7 425 303.6 415.8 315.9C411.3 321.9 429.2 321 444.5 314.4C460.5 307.5 473.6 294.9 461 295.7Z" fill="#2F1829" />
                                <path id="Vector_12" d="M200.2 293.4C200.2 293.4 214.2 293.1 226.5 297.9C238.8 302.7 241.5 317.4 229.2 319.2C217 321 189.1 304.7 190.7 298.1C191.9 293.1 200.2 293.4 200.2 293.4Z" fill="#2F1829" />
                            </g>
                            <path id="Vector_13" d="M136.3 213.7L128.4 241.1C125.3 238.4 121.7 235.2 117.8 231.6L116.1 228.4C116.1 228.4 119.1 193.2 109.2 179.1C118.7 185.7 123.3 212.4 123.3 212.4L121.8 214.4H123.3C123.3 214.4 125.7 218.9 126.6 225.5C132.7 193.9 126.8 178.6 126.6 178.1C126.8 178.4 131.6 184.2 134.4 193.8C137.3 203.6 136.2 209.7 136.2 209.7L133.8 213.6H136.3V213.7Z" fill="black" />
                            <g id="Group_2">
                                <g id="Group_3">
                                    <path id="Vector_14" d="M376.1 240.6C376.1 240.6 378.7 238.3 380.6 235.8C380.9 235.4 381.3 234.9 381.5 234.5L382.7 235.9L382.3 233.7C382.3 233.7 390.4 230.9 393.3 223.1C391.5 231.6 388.1 238 384.1 240.9C382.3 242.2 380.5 242.8 378.6 242.7C372.3 242.5 376.1 240.6 376.1 240.6Z" fill="#F3475C" />
                                    <g id="Group_4" opacity="0.25">
                                        <path id="Vector_15" opacity="0.25" d="M393.3 223.1C392.6 225.3 391.8 227.5 390.8 229.6C389.8 231.7 388.7 233.7 387.4 235.6C386.1 237.5 384.5 239.3 382.6 240.6C380.7 242 378.3 242.7 376 242.6C375.9 242.6 375.8 242.5 375.8 242.4C375.8 242.3 375.9 242.2 376 242.2C378.3 242.4 380.5 241.7 382.4 240.4C384.3 239.1 385.9 237.4 387.2 235.5C388.6 233.6 389.7 231.6 390.7 229.5C391.7 227.5 392.5 225.3 393.3 223.1Z" fill="white" />
                                    </g>
                                    <path id="Vector_16" opacity="0.25" d="M376.1 240.6C376.1 240.6 378.7 238.3 380.6 235.8C381.4 238.2 383.1 240 384.1 240.9C382.3 242.2 380.5 242.8 378.6 242.7C372.3 242.5 376.1 240.6 376.1 240.6Z" fill="black" />
                                </g>
                                <path id="Vector_17" d="M313.5 225.2C313.5 225.2 294.9 207.7 297.9 184.4C299.8 195.2 307.7 208.1 307.7 208.1L306.7 211L310.2 210.3C310.2 210.3 314.6 183.7 304.7 170.8C318.1 184.6 317.9 205.1 317.9 205.1L315.4 208.9L317.9 210C317.9 210 315 220 323.7 216.1C332.4 212.3 337.9 179.2 330 170.8C339.4 178.9 337.9 206.8 337.9 207.7C337.9 208.6 333.8 212.4 333.8 212.4L336.9 214.7C336.9 214.7 335 233.6 313.5 225.2Z" fill="black" />
                                <path id="Vector_18" d="M398.8 250C398.8 250 392.3 243.9 393.4 235.8C394.1 239.6 396.8 244 396.8 244L396.5 245L397.7 244.8C397.7 244.8 399.2 235.5 395.8 231.1C400.4 235.9 400.4 243 400.4 243L399.5 244.3L400.4 244.7C400.4 244.7 399.4 248.2 402.4 246.8C405.4 245.5 407.3 234 404.6 231.1C407.9 233.9 407.3 243.6 407.3 243.9C407.3 244.2 405.9 245.5 405.9 245.5L407 246.3C406.9 246.4 406.3 253 398.8 250Z" fill="black" />
                                <g id="Group_5">
                                    <path id="Vector_19" d="M374 241.1L368.7 241.5C372.5 238.1 371.9 234.8 371.4 233.3C371.2 232.8 371 232.4 371 232.4L373.5 232L372.1 230.1C372.1 230.1 376.6 224.9 378.3 211.1C383.6 220.4 381.5 228.8 378.7 234.3C376.6 238.6 374 241.1 374 241.1Z" fill="#FFCA51" />
                                    <g id="Group_6" opacity="0.25">
                                        <path id="Vector_20" opacity="0.25" d="M378.3 211.1C378.9 213.7 379.2 216.3 379.3 218.9C379.4 221.5 379.4 224.2 379 226.8C378.6 229.4 378 232 377 234.4C376 236.8 374.5 239.1 372.7 241.1C372.6 241.2 372.5 241.2 372.4 241.1C372.3 241 372.3 240.9 372.4 240.8C374.2 238.9 375.6 236.7 376.7 234.3C377.7 231.9 378.4 229.3 378.8 226.8C379.2 224.2 379.3 221.6 379.2 219C379.1 216.3 378.9 213.7 378.3 211.1Z" fill="white" />
                                    </g>
                                    <path id="Vector_21" opacity="0.25" d="M374 241.1L368.7 241.5C372.5 238.1 371.9 234.8 371.4 233.3C374.2 235 377 234.8 378.7 234.3C376.6 238.6 374 241.1 374 241.1Z" fill="black" />
                                </g>
                                <path id="Vector_22" d="M408.3 251.1H323L336.7 240C336.7 240 354.9 230.6 362.5 232.6C370.1 234.5 368.9 240.9 368.9 240.9C368.9 240.9 369.4 240.4 370.1 239.8C371.8 238.5 375 236.7 378.2 238.6C382.8 241.4 382.1 245 382.1 245.2C382.2 245.1 385 242.4 387.3 243.2C389.6 244.1 390.5 246.6 390.5 246.6C390.5 246.6 393.5 242.5 396 244C398.5 245.5 400 248.6 400 248.6C400 248.6 404 244.6 408.3 251.1Z" fill="#982245" />
                                <path id="Vector_23" opacity="0.25" d="M391.9 251.1H323.1L336.8 240C336.8 240 355 230.6 362.6 232.6C370.2 234.5 369 240.9 369 240.9C369 240.9 369.5 240.4 370.2 239.8C370.4 241.2 370.4 242.6 370.2 244C370.2 244 374.1 242.5 376.6 244.6C379.1 246.7 378.4 248.6 378.4 248.6C378.4 248.6 381.8 246.6 385.7 248.6C386.8 249.3 389.3 250.2 391.9 251.1Z" fill="black" />
                            </g>
                            <g id="Group_7">
                                <path id="Vector_24" d="M237.3 191.1V97.5H201.8V97.8L159 166.6L140.3 196.7L142.4 218.4H201.8V251H237.3V218.4H253V191H237.3V191.1ZM201.8 191.1H174.2L199.6 147.4L201.8 143.8V191.1Z" fill="url(#paint6_linear)" />

                                <path id="Vector_26" d="M487.5 191.1V97.5H452V97.8L390.5 196.7L392.6 218.4H452V251H487.5V218.4H503.1V191H487.5V191.1ZM452 191.1H424.4L449.8 147.4L452 143.8V191.1V191.1Z" fill="url(#paint8_linear)" />
                                <path id="Vector_27" opacity="0.25" d="M230.7 97.5C225.9 103.6 209.6 101.4 206 101.8C201.8 102.2 172.9 153.1 169 159.6C166.4 163.8 161.9 165.8 159.1 166.7L201.9 97.9V97.6H230.7V97.5Z" fill="white" />
                                <path id="Vector_28" opacity="0.25" d="M487.5 97.5V168.3C478.4 160.7 483.4 104.9 482 103.1C480.5 101.1 461.5 102.4 458 101.3C455.7 100.6 453.8 98.6 452.8 97.4H487.5V97.5Z" fill="white" />
                                <path id="Vector_29" opacity="0.25" d="M329.1 232.4C300.5 233.7 303.8 192.4 303.8 192.4C304 202.9 305.4 210.6 308.1 215.6C311 220.9 315.6 223.6 321.8 223.6C327.8 223.6 332.3 221 335.2 215.8C338.1 210.6 339.6 202.5 339.6 191.5V153.5C339.6 142.5 338.2 134.2 335.3 128.8C332.4 123.3 327.8 120.6 321.6 120.6C321.6 120.6 339.3 118.4 346.6 144.7C353.8 171 357.8 231.1 329.1 232.4Z" fill="black" />

                            </g>
                            <g id="zero">
                                <path id="Vector_25" d="M361.2 110.3C351.9 99 338.7 93.3 321.6 93.3C304.6 93.3 291.4 98.9 282.1 110.2C272.8 121.5 268.1 137.4 268.1 158.2V186.3C268.1 206.9 272.8 222.9 282.1 234.2C291.5 245.5 304.7 251.2 321.8 251.2C338.7 251.2 351.9 245.6 361.2 234.3C370.5 223 375.2 207.1 375.2 186.3V158.3C375.2 137.6 370.5 121.6 361.2 110.3ZM303.8 151.3C304 141 305.5 133.4 308.3 128.3C311.1 123.2 315.5 120.7 321.6 120.7C327.9 120.7 332.4 123.4 335.3 128.9C338.2 134.4 339.6 142.6 339.6 153.6V191.6C339.5 202.6 338.1 210.7 335.2 215.9C332.3 221.1 327.8 223.7 321.8 223.7C315.5 223.7 311 221 308.1 215.7C305.4 210.7 303.9 202.9 303.8 192.5C303.8 191.9 303.8 191.2 303.8 190.6V151.3V151.3Z" fill="url(#paint7_linear)" />
                                <path id="Vector_30" d="M291.5 110.1C291.5 110.1 279.6 101.5 278.3 88.1C286.9 90.5 291.5 101 291.5 101C291.5 101 289.3 91.4 291.5 84.9C297.8 94.1 296.1 101.6 291.5 110.1Z" fill="url(#paint9_linear)" />
                            </g>
                            <g id="Group_8">
                                <g id="Group_9">
                                    <path id="Vector_31" d="M569.9 241.4V244.7C569.3 244.6 567.9 244.7 566.7 244.9C565.9 245 565.2 245 564.8 245.1L564.5 242.3L565.8 242.1L569.9 241.4Z" fill="url(#paint10_linear)" />
                                    <g id="handboy">
                                        <path id="Vector_32" d="M529.1 188C529.1 188 529.2 188.3 528.8 188.7C528.5 189 528 189.3 527.1 189.7C521.7 191.8 510.6 186.7 504.5 183.3C498.5 179.9 481.3 182.7 469.7 181.1C458.1 179.5 453.2 173.3 442.8 170.7C432.4 168.1 393.6 179.3 391.4 170.6C389.2 161.9 432.8 77.2 436.6 83.1C440.3 89 453.2 89.4 462.3 94.1C471.4 98.8 479.1 122.1 489.2 124.4C490.6 124.7 491.9 125.2 493.2 125.9C501.2 130.2 507 140.9 507.2 149.7C507.4 159.9 521.4 168.1 526.5 173.6C531.5 179.2 529.1 188 529.1 188Z" fill="url(#paint11_linear)" />
                                        <path id="Vector_33" opacity="0.25" d="M529.1 188C529.1 188 529.2 188.3 528.8 188.7C530.6 177.5 520.3 172.2 510.8 164.4C501.1 156.3 505.2 150.2 503.2 141.9C502 137 497 130.5 493.2 126C501.2 130.3 507 141 507.2 149.8C507.4 160 521.4 168.2 526.5 173.7C531.5 179.2 529.1 188 529.1 188Z" fill="white" />
                                        <path id="Vector_34" d="M528.9 186.5L526.3 188.9C525.9 189.2 526.1 189.8 526.5 190L528.7 190.7L533.7 196.2C533.9 196.4 534.3 196.5 534.5 196.2L535.3 195.4C535.5 195.2 535.6 194.8 535.3 194.6L530.3 189.1L529.8 186.9C529.8 186.3 529.2 186.1 528.9 186.5Z" fill="#2F1829" />
                                        <path id="Vector_35" d="M548.7 190C548 190.9 547.2 192 546.3 193.1C546 193.5 545.6 193.9 545.3 194.3C543.9 196 542.7 197.4 542.3 197.5C541.3 197.7 535.7 194.5 534.9 194.5C534.1 194.5 532.2 195.9 531.7 195.7C531.2 195.6 528.5 193.1 528.6 192.4C528.7 191.8 531.1 189.6 532.3 189.3C532.6 189.2 533.4 189.3 534.3 189.5H534.4C536.7 190 540.1 191.1 540.6 190.8C540.9 190.7 541.4 189.8 542 188.7C542.2 188.3 542.4 187.9 542.6 187.5C542.9 187 543.1 186.5 543.4 186C543.6 185.5 543.8 185.1 544 184.8C544.5 185.6 545.3 186.6 546.2 187.5C547.2 188.8 548.2 189.8 548.7 190Z" fill="url(#paint12_linear)" />
                                    </g>
                                    <path id="Vector_36" d="M571.4 196.6C571.4 198.4 571.4 200.2 571.3 201.6C570.9 207.3 570.4 211.9 568.5 212C566.6 212.1 566.2 196.7 566.3 195.8C566.3 195.6 566.3 195.2 566.4 194.7C566.5 193 566.5 190 566.5 188.7C566.5 188.4 566.5 188.2 566.5 188.1L566.9 187.9L571.1 185.2C571.1 185.2 571.3 188.8 571.5 193C571.5 193.6 571.5 194.1 571.5 194.7C571.4 195.3 571.4 195.9 571.4 196.6Z" fill="url(#paint13_linear)" />
                                    <path id="Vector_37" opacity="0.25" d="M571.4 196.6C570.4 197.4 568.8 198.5 567.2 198.6C564.6 198.7 568.4 193.2 569.3 193.1C569.6 193.1 570.4 193 571.3 193C571.3 193.6 571.3 194.1 571.3 194.7C571.4 195.3 571.4 195.9 571.4 196.6Z" fill="black" />
                                    <path id="Vector_38" d="M571.4 194.7C570.3 195.1 568.9 195.3 567 194.9C566.7 194.8 566.5 194.8 566.3 194.6C564.7 193.7 565.3 191 566.4 188.6C566.5 188.3 566.7 188 566.8 187.8L571 185.1C571 185.1 571.3 189.8 571.4 194.7Z" fill="#2F1829" />
                                    <path id="Vector_39" d="M562.5 164.2C562.4 164.8 562.2 165.5 561.7 166.2C561.2 167.1 560.4 168 559.7 168.6C559.1 169 558.6 169.3 558.2 169.3C556.9 169.1 555.2 166.9 555.1 166.5C555.1 166.1 556.5 165.9 556.4 164.7C556.2 163.5 555.4 163.3 554.9 163.5C554.3 163.7 553.6 165 553.6 166.2C553.2 166.1 552.5 164.7 551.1 163.8C550.7 163.6 550.3 163.4 549.8 163.3C549.2 163.2 548.5 163.2 547.7 163.5C547.3 159.1 550 157.2 552 158C552 158 551.3 156.5 550.2 156.2C552.7 156.6 553.3 158.7 553.3 158.7C553.3 158.7 554 155.8 557.1 155.4C560.2 155 560.8 159.1 560.8 159.1C560.8 159.1 561.5 157.1 561.2 155.9C561.8 157.5 561.1 160.2 561.1 160.2C561.1 160.2 562.6 160.6 563 162.6C561.7 161.6 561.7 161.7 561.7 161.7C561.7 161.7 562.6 162.3 562.5 164.2Z" fill="#2F172B" />
                                    <path id="Vector_40" d="M559.7 168.5C559.5 169.2 559.2 169.8 559.1 170.1C558.8 170.7 555.6 173.4 553.3 170.3C551.4 167.7 551.1 164.7 551.1 163.8C552.5 164.6 553.2 166.1 553.6 166.2C553.6 165 554.3 163.8 554.9 163.5C555.5 163.3 556.2 163.5 556.4 164.7C556.6 165.9 555.1 166.1 555.1 166.5C555.1 166.9 556.8 169.1 558.2 169.3C558.6 169.2 559.1 169 559.7 168.5Z" fill="url(#paint14_linear)" />
                                    <path id="Vector_41" d="M561.3 155.6C561.2 155.4 561.2 155.3 561.1 155.2C561.2 155.3 561.2 155.5 561.3 155.6Z" fill="#2F172B" />
                                    <path id="Vector_42" d="M572.4 184.6C572.1 185.2 571.7 185.7 571.4 186.2C571.3 186.3 571.2 186.5 571.1 186.6C570.1 187.8 569.2 188.5 569.2 188.5C569.2 188.5 569.2 188.5 569.2 188.6C569.2 188.7 569.2 188.8 569.3 189C569.4 189.4 569.5 190.1 569.6 191C569.6 191.1 569.6 191.3 569.7 191.4C569.8 191.8 569.8 192.2 569.8 192.6C569.8 192.8 569.9 193.1 569.9 193.3C569.9 193.4 569.9 193.6 569.9 193.7C570 194.4 570 195 570 195.7C570 195.8 570 196 570 196.1C570 196.9 569.9 197.6 569.8 198.1C569.8 198.3 569.7 198.4 569.7 198.5C569.6 198.7 569.6 198.8 569.5 198.9C569.4 199 569.2 199.1 569 199.2C567.5 199.9 563.7 199.9 559.8 199.7C556.5 199.5 553.2 199.2 551.5 198.9C551 198.8 550.6 198.7 550.3 198.5C550.1 198.4 549.9 198.2 549.8 198.1C549.7 198 549.6 197.9 549.6 197.8C549.3 197.3 549.2 196.8 549.2 196.1C549.2 196 549.2 195.8 549.2 195.7C549.3 195.1 549.4 194.5 549.5 193.8V193.7C549.5 193.6 549.6 193.4 549.6 193.3C549.8 192.6 550 192 550.1 191.3C550.1 191.2 550.1 191.1 550.2 191V190.9C550.4 190.1 550.5 189.4 550.5 188.9C550.5 188.7 550.5 188.6 550.6 188.5C550.7 187.2 550.6 186.8 550.6 186.8C550.6 186.8 550.3 187.6 549.8 188.5C549.7 188.6 549.6 188.8 549.6 188.9C549.3 189.4 548.9 189.9 548.7 189.9C548.7 189.9 548.6 189.9 548.5 189.9C548.2 189.8 547.8 189.4 547.3 188.9C547.2 188.8 547 188.6 546.9 188.5C546.6 188.2 546.3 187.9 546 187.5C545.7 187.2 545.4 186.8 545.1 186.5C545 186.4 544.9 186.2 544.8 186.1C544.4 185.6 544.1 185.2 543.8 184.8C543.6 184.5 543.5 184.3 543.4 184.1C543.3 184 543.3 183.9 543.3 183.8V183.7C543.4 183.4 543.6 182.6 543.9 181.7C544 181.6 544 181.4 544.1 181.3C544.3 180.7 544.6 180 545 179.3C545.1 179.2 545.1 179 545.2 178.9C545.5 178.3 545.9 177.6 546.2 176.9C546.3 176.8 546.4 176.6 546.4 176.5C546.8 175.8 547.2 175.1 547.6 174.5C547.7 174.4 547.8 174.2 547.9 174.1C548.5 173.3 549 172.6 549.6 172.1C549.8 171.9 549.9 171.8 550.1 171.7C550.2 171.6 550.3 171.6 550.4 171.5C551.2 171 552 170.6 552.8 170.3C555.5 169.3 557.8 169.4 557.8 169.4C559.1 169.4 560.4 169.7 561.7 170.2C562.6 170.6 563.5 171.1 564.4 171.7C564.6 171.8 564.8 172 565 172.1C565.7 172.7 566.4 173.3 567 174.1C567.1 174.2 567.2 174.4 567.4 174.5C567.9 175.1 568.4 175.8 568.8 176.5C568.9 176.6 569 176.8 569.1 176.9C569.5 177.5 569.8 178.2 570.2 178.9C570.3 179 570.3 179.2 570.4 179.3C570.7 179.9 571 180.6 571.3 181.3C571.4 181.4 571.4 181.6 571.5 181.7C571.7 182.3 572 183 572.2 183.7C572.2 183.8 572.3 184 572.3 184.1C572.4 184.3 572.4 184.5 572.4 184.6Z" fill="#FFCA51" />
                                    <g id="Group_10">
                                        <path id="Vector_43" opacity="0.25" d="M565.2 172.2H549.9C550.1 172 550.2 171.9 550.4 171.8H564.6C564.8 171.9 565 172 565.2 172.2Z" fill="white" />
                                        <path id="Vector_44" opacity="0.25" d="M567.6 174.6H548C548.1 174.5 548.2 174.3 548.3 174.2H567.3C567.3 174.3 567.4 174.4 567.6 174.6Z" fill="white" />
                                        <path id="Vector_45" opacity="0.25" d="M569.2 177H546.4C546.5 176.9 546.6 176.7 546.6 176.6H569C569.1 176.7 569.1 176.8 569.2 177Z" fill="white" />
                                        <path id="Vector_46" opacity="0.25" d="M570.5 179.4H545.2C545.3 179.3 545.3 179.1 545.4 179H570.3C570.4 179.1 570.4 179.2 570.5 179.4Z" fill="white" />
                                        <path id="Vector_47" opacity="0.25" d="M571.5 181.8H544.2C544.3 181.7 544.3 181.5 544.4 181.4H571.4C571.4 181.5 571.5 181.7 571.5 181.8Z" fill="white" />
                                        <path id="Vector_48" opacity="0.25" d="M572.3 184.2H543.6C543.5 184.1 543.5 184 543.5 183.9V183.8H572.2C572.2 183.9 572.3 184 572.3 184.2Z" fill="white" />
                                        <path id="Vector_49" opacity="0.25" d="M571.4 186.2C571.3 186.3 571.2 186.5 571.1 186.6H545.4C545.3 186.5 545.2 186.3 545.1 186.2H571.4Z" fill="white" />
                                        <path id="Vector_50" opacity="0.25" d="M547.1 188.6H550C549.9 188.7 549.8 188.9 549.8 189H547.5C547.4 188.9 547.3 188.7 547.1 188.6Z" fill="white" />
                                        <path id="Vector_51" opacity="0.25" d="M569.3 189H550.7C550.7 188.8 550.7 188.7 550.8 188.6H569.3C569.3 188.7 569.3 188.8 569.3 189Z" fill="white" />
                                        <path id="Vector_52" opacity="0.25" d="M569.7 191.4H550.3C550.3 191.3 550.3 191.2 550.4 191.1V191H569.7C569.7 191.1 569.7 191.3 569.7 191.4Z" fill="white" />
                                        <path id="Vector_53" opacity="0.25" d="M570 193.8H549.7C549.7 193.7 549.8 193.5 549.8 193.4H570C569.9 193.6 570 193.7 570 193.8Z" fill="white" />
                                        <path id="Vector_54" opacity="0.25" d="M570.1 195.8C570.1 195.9 570.1 196.1 570.1 196.2H549.3C549.3 196.1 549.3 195.9 549.3 195.8H570.1Z" fill="white" />
                                        <path id="Vector_55" opacity="0.25" d="M569.9 198.2C569.9 198.4 569.8 198.5 569.8 198.6H550.5C550.3 198.5 550.1 198.3 550 198.2H569.9Z" fill="white" />
                                    </g>
                                    <path id="Vector_56" d="M570.3 238.7C569.4 239.3 563.3 239.9 563.3 239.9L563.1 238.8L562 232.1L559.3 216.4L556.6 236.1L555.8 241.9C555.8 241.9 548.3 242.3 548.3 240.5C548.3 240.3 548.3 239.5 548.4 238.2C548.6 230.2 549.5 203.9 549.7 198C550 198.6 550.7 199 551.7 199.1C551.8 199.1 551.9 199.1 552 199.1C555.8 199.7 566.5 200.6 569.1 199.4C569.2 200.4 569.3 201.9 569.4 203.8C569.8 211.4 570.1 225.2 570.3 232.9C570.3 236.4 570.3 238.7 570.3 238.7Z" fill="#2F1829" />
                                    <path id="Vector_57" opacity="0.25" d="M562 232.1L559.3 216.4C559.3 216.4 560 210.1 560.3 209.3C560.6 208.6 562.5 209.1 563.3 208.6C563.7 209.6 561 211 560.8 214.3C560.7 216.6 561.5 226.7 562 232.1Z" fill="black" />
                                    <path id="Vector_58" opacity="0.25" d="M551.1 201.4C551.1 201.4 550.9 205 553.8 206.7" stroke="white" stroke-width="0.4635" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                    <g id="Group_11" opacity="0.25">
                                        <g id="Group_12" opacity="0.25">
                                            <path id="Vector_59" opacity="0.25" d="M551.8 206.2L551.7 206.9" stroke="white" stroke-width="0.4635" stroke-linecap="round" stroke-linejoin="round" />
                                            <path id="Vector_60" opacity="0.25" d="M551.7 208.2L550.3 238" stroke="white" stroke-width="0.4635" stroke-linecap="round" stroke-linejoin="round" stroke-dasharray="1.39 1.39" />
                                            <path id="Vector_61" opacity="0.25" d="M550.2 238.7V239.4" stroke="white" stroke-width="0.4635" stroke-linecap="round" stroke-linejoin="round" />
                                        </g>
                                    </g>
                                    <path id="Vector_62" opacity="0.25" d="M562 209.6L564.7 237.9" stroke="white" stroke-width="0.4635" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" stroke-dasharray="1.39 1.39" />
                                    <path id="Vector_63" opacity="0.25" d="M564.3 201.9C564.3 201.9 564 205.4 564.3 206C564.6 206.7 565.9 207.2 566.2 207.4C566.5 207.5 567.7 206.4 567.8 205.7C567.9 205 567.9 202 567.9 202C567.9 202 565.7 201.6 564.3 201.9Z" stroke="white" stroke-width="0.4635" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                    <path id="Vector_64" opacity="0.25" d="M570.3 238.7C569.4 239.3 563.3 239.9 563.3 239.9L563.1 238.8C564.9 237.8 568.4 235.6 570.2 232.9C570.3 236.4 570.3 238.7 570.3 238.7Z" fill="black" />
                                    <path id="Vector_65" d="M570.7 241.3L569.9 241.4L564.5 242.2L564.1 242.3C563.3 242.4 562.6 241.9 562.4 241.1V241C562.3 240.2 562.8 239.5 563.6 239.3L570.2 238.3C571 238.2 571.7 238.7 571.9 239.5V239.6C572 240.4 571.5 241.2 570.7 241.3Z" fill="#4C3146" />
                                    <path id="Vector_66" opacity="0.25" d="M556.7 236L555.9 241.8C555.9 241.8 548.4 242.2 548.4 240.4C548.4 240.2 548.4 239.4 548.5 238.1C550.2 238 554.3 237.5 556.7 236Z" fill="black" />
                                    <path id="Vector_67" d="M556.5 242.2V242.3C556.4 243.1 555.7 243.7 554.9 243.6L549.2 243.1L548.3 243C547.5 242.9 546.9 242.2 547 241.4V241.3C547.1 240.5 547.8 239.9 548.6 240L555.2 240.6C556 240.7 556.6 241.4 556.5 242.2Z" fill="#4C3146" />
                                    <path id="Vector_68" opacity="0.25" d="M569.4 203.8C560.2 205 554 200.8 551.9 199.1C555.7 199.7 566.4 200.6 569 199.4C569.2 200.4 569.3 201.9 569.4 203.8Z" fill="black" />
                                    <path id="Vector_69" opacity="0.25" d="M550.4 191.1C551.1 187.8 550.8 186.9 550.8 186.9C550.8 186.9 549.6 189.9 548.9 190C548.6 190 547.4 188.9 546.2 187.6C547.2 187.3 548.7 186.8 549.5 185.9C550.7 184.5 550.6 178.5 551.1 178.5C551.6 178.5 552.7 189.6 549.6 193.9C549.9 193 550.2 192 550.4 191.1Z" fill="black" />
                                    <path id="Vector_70" opacity="0.25" d="M572.4 184.6C571 187.2 569.2 188.5 569.2 188.5C569.2 188.5 567.6 179.9 567.1 179.1C566.7 178.4 567.3 177.8 568.2 180.7C568.9 183 570.7 184.7 572.3 184.3C572.4 184.3 572.4 184.4 572.4 184.6Z" fill="black" />
                                    <path id="Vector_71" opacity="0.25" d="M569.5 199.1C569.4 199.2 569.2 199.3 569 199.4C567.5 200.1 563.7 200.1 559.8 199.9C562.4 199.6 568.7 198.2 569.8 192.7C570.1 195.2 570.3 198.2 569.5 199.1Z" fill="black" />
                                    <path id="Vector_72" opacity="0.25" d="M562 170.2C561.7 170.6 561.1 170.8 560.1 170.6C558.2 170.2 555.7 171 554.5 170.8C553.8 170.7 553.4 170.5 553.1 170.3C555.8 169.3 558.1 169.4 558.1 169.4C559.4 169.4 560.7 169.7 562 170.2Z" fill="black" />
                                    <path id="Vector_73" d="M548.7 190C548 190.9 547.2 192 546.3 193.1C544.4 192 542.9 190 542 188.8C542.8 187.4 543.6 185.7 544 184.9C544.5 185.7 545.3 186.7 546.2 187.6C547.2 188.8 548.2 189.8 548.7 190Z" fill="#2F1829" />
                                    <path id="Vector_74" opacity="0.25" d="M548.7 190C548 190.9 547.2 192 546.3 193.1C546 193.5 545.6 193.9 545.3 194.3C545.4 190.8 544.2 187.7 543.5 186.1C543.7 185.6 543.9 185.2 544.1 184.9C544.6 185.7 545.4 186.7 546.3 187.6C547.2 188.8 548.2 189.8 548.7 190Z" fill="black" />
                                    <path id="Vector_75" opacity="0.25" d="M542.7 187.6C542.7 188.6 541.7 190.1 541.5 190.5C541.2 191 541.4 193.3 541.1 193C540.8 192.7 540.7 191.6 540.3 191.2C539.9 190.9 535.3 189.7 534.5 189.5C536.8 190 540.2 191.1 540.7 190.8C541 190.7 541.5 189.8 542.1 188.7C542.3 188.5 542.5 188.1 542.7 187.6Z" fill="white" />
                                    <path id="Vector_76" opacity="0.25" d="M561.7 166.2C561.2 167.1 560.4 168 559.7 168.6C559.1 169 558.6 169.3 558.2 169.3C556.9 169.1 555.2 166.9 555.1 166.5C555.1 166.1 556.5 165.9 556.4 164.7C556.2 163.5 555.4 163.3 554.9 163.5C554.3 163.7 553.6 165 553.6 166.2C553.2 166.1 552.5 164.7 551.1 163.8C550.7 163.6 550.3 163.4 549.8 163.3C550.5 163.2 551.4 163.2 551.9 163.4C553.1 163.9 553.2 164.4 553.2 164.4C553.2 164.4 553.4 162.6 555.4 162.2C557.1 161.9 558.4 166.5 561.7 166.2Z" fill="black" />
                                    <path id="Vector_77" d="M555.9 251.1H542.8C542.8 251.1 542.7 250.7 542.7 250.2C542.7 249.5 542.9 248.6 544 248.2C544.4 248 544.8 247.9 545.2 247.7C546.8 246.9 548.6 245.9 548.9 245.3C548.9 245.3 549 245.3 549.2 245.4C549.5 245.5 550.1 245.8 550.8 246C551.1 246.1 551.4 246.1 551.7 246.1C552.4 246.1 553.9 245.7 554.8 245.6C555.2 245.5 555.5 245.5 555.6 245.7C555.8 246 556 248.7 556.1 250.2C555.8 250.7 555.9 251.1 555.9 251.1Z" fill="#1F3247" />
                                    <path id="Vector_78" d="M554.9 243.6C554.8 244.2 554.7 244.9 554.5 245.5C553.8 245.6 552.9 245.8 552.2 245.9C551.9 245.9 551.7 246 551.5 246C550.7 246 549.6 245.5 549.1 245.3C549.1 244.6 549.2 243.7 549.2 243L551.5 243.2L554.9 243.6Z" fill="url(#paint15_linear)" />
                                    <path id="Vector_79" d="M571.6 251.1H563.7C563.7 251.1 563.6 250.7 563.6 250.2C563.6 249.8 563.7 249.4 563.9 248.9C564.5 247.6 564.2 245.6 564.4 245.2C564.4 245.2 564.5 245.2 564.8 245.2C565.9 245.1 569 244.8 569.9 244.8C570 244.8 570 244.8 570.1 244.8C570.6 245 571.2 248.4 571.5 250.2C571.6 250.6 571.6 250.9 571.6 251.1Z" fill="#1F3247" />
                                    <path id="Vector_80" opacity="0.25" d="M555.8 250.1C555.8 250.7 555.9 251 555.9 251H542.8C542.8 251 542.7 250.6 542.7 250.1H555.8Z" fill="black" />
                                    <path id="Vector_81" opacity="0.25" d="M571.6 251.1H563.7C563.7 251.1 563.6 250.7 563.6 250.2H571.5C571.6 250.6 571.6 250.9 571.6 251.1Z" fill="black" />
                                    <path id="Vector_82" d="M550.6 245.9C549.4 246.7 547.1 248.1 546.3 248.1C545.7 248.1 545.3 247.8 545 247.6C546.6 246.8 548.4 245.8 548.7 245.2C548.7 245.2 548.8 245.2 549 245.3C549.4 245.5 550 245.7 550.6 245.9Z" fill="#122230" />
                                    <path id="Vector_83" opacity="0.25" d="M554.9 243.6C554.8 244.2 554.7 244.9 554.5 245.5C553.8 245.6 552.9 245.8 552.2 245.9L551.4 243.2L554.9 243.6Z" fill="black" />
                                    <path id="Vector_84" opacity="0.25" d="M569.9 241.4V244.7C569.3 244.6 567.9 244.7 566.7 244.9L565.8 242.1L569.9 241.4Z" fill="black" />
                                </g>
                            </g>
                            <g id="Group_13">
                                <g id="Group_14">
                                    <path id="Vector_85" d="M98.3 163.3C98.3 163.3 98.2 164.3 98.1 165.5C97.9 167.1 97.5 169.2 96.8 170.2C96.8 170.2 96.8 170.3 96.7 170.3C95.6 171.7 93.6 171.4 92.6 169.6C93.2 168.8 93.5 167.9 93.1 167.5C92.3 166.7 92.5 164.4 93.7 164.7C94.9 165 95.1 168.2 95.5 168.1C95.8 168.2 97.6 165.3 98.3 163.3Z" fill="url(#paint16_linear)" />
                                    <path id="Vector_86" d="M98.7 161.9C98.7 162.2 98.6 162.7 98.4 163.3C98.3 163.6 98.1 164 98 164.3C97.2 166.1 95.9 168.1 95.6 168.2C95.2 168.3 95 165 93.8 164.8C92.6 164.5 92.4 166.8 93.2 167.6C93.6 168 93.3 168.9 92.7 169.7C92 170.5 91 171.1 89.9 170.4C87.9 169.2 87.5 161.4 87.5 160.8C87.5 160.8 87.5 160.3 87.6 159.6C87.8 158.6 88.5 157.4 90.2 156.6C93.2 155.3 98.7 155.6 98.7 161.9Z" fill="#2F1829" />
                                    <path id="Vector_87" d="M114.4 194.3C114.4 194.4 114.4 194.5 114.3 194.5C114.2 194.9 114.1 195.1 114 195.1C113.9 195.1 113.3 195.1 112.4 195C111.2 194.8 109.4 194.6 107.8 194.3C105.8 193.9 104 193.5 103.4 193.2C102.9 192.9 102.1 191.9 101.3 190.7C101.1 190.4 100.9 190.1 100.7 189.7C99.7 188.1 98.9 186.5 98.7 186.1C98.7 186 98.6 186 98.6 186C98.6 186 98.6 186 98.6 186.1C98.6 186.5 98.4 188.1 97.9 189.7C97.8 190 97.7 190.4 97.5 190.7C97.4 191 97.2 191.3 97 191.5C96.5 192.3 96.6 193.3 96.9 194.3C96.9 194.4 97 194.5 97 194.7C97.1 194.9 97.2 195.1 97.3 195.3C97.5 195.7 97.6 196 97.8 196.3C98.3 197.3 98.7 198.2 98.6 198.7C98.6 198.8 98.5 198.8 98.4 198.9C98.3 199 98.3 199 98.2 199.1C97.9 199.3 97.3 199.6 96.6 199.9C92.7 201.5 83.9 203.4 80.1 199.9C80 199.8 80 199.8 79.9 199.7C79.7 199.4 79.6 199.2 79.6 198.9C79.6 198.5 79.8 198.2 80.1 197.7C80.5 197 81.2 196.3 81.7 195.2C81.9 194.9 82 194.6 82.1 194.2C82.3 193.7 82.5 193.1 82.5 192.4C82.6 191.8 82.6 191.1 82.7 190.5C82.7 190.2 82.8 189.8 82.8 189.5C82.9 188.2 82.9 187 82.9 185.9C82.9 185.6 82.9 185.2 82.9 184.9C82.9 183.6 82.8 182.4 82.8 181.3C82.8 181 82.8 180.6 82.8 180.3C82.8 179 82.8 177.8 82.9 176.7C82.9 176.4 83 176 83 175.7C83.3 174.2 83.9 173 85 172.1L85.1 172C85.5 171.7 85.9 171.4 86.2 171.1C86.6 170.8 87 170.6 87.3 170.3C89.7 168.9 90.9 169.1 90.9 169.1C90.9 169.1 91.6 169.1 92.7 169.3C93.8 169.5 95.1 169.8 96.5 170.3C96.7 170.4 96.8 170.4 97 170.5C97.4 170.7 97.7 170.8 98.1 171C98.3 171.1 98.6 171.3 98.8 171.4C99.1 171.6 99.4 171.8 99.6 172C100.3 172.5 100.8 173.1 101.3 173.8C101.6 174.3 102 175 102.3 175.6C102.5 175.9 102.6 176.2 102.8 176.6C103.3 177.8 103.9 179 104.4 180.2C104.5 180.5 104.7 180.9 104.8 181.2C105.3 182.5 105.8 183.8 106.1 184.8C106.2 185.1 106.3 185.5 106.4 185.8C106.8 186.9 107 187.6 107.1 187.9C107.2 188.3 108.1 188.7 109.2 189.1C109.6 189.2 109.9 189.3 110.3 189.4C111.1 189.6 111.8 189.8 112.5 190C113 190.1 113.5 190.3 113.9 190.4C114.3 190.5 114.5 190.6 114.6 190.7C114.6 190.7 114.6 190.8 114.7 190.9C114.7 191.8 114.6 193.3 114.4 194.3Z" fill="#F5B539" />
                                    <g id="Group_15" opacity="0.25">
                                        <g id="Group_16" opacity="0.25">
                                            <path id="Vector_88" opacity="0.25" d="M98.1 171.4C98.4 171.6 98.7 171.7 99 171.9H85.7C85.9 171.7 86.2 171.5 86.4 171.4H98.1ZM98.1 171.2H86.2C85.8 171.5 85.5 171.7 85.1 172.1L85 172.2H99.7C99.2 171.8 98.7 171.5 98.1 171.2Z" fill="white" />
                                        </g>
                                        <g id="Group_17" opacity="0.25">
                                            <path id="Vector_89" opacity="0.25" d="M102.1 176.1C102.2 176.3 102.3 176.4 102.4 176.6H83.1C83.1 176.4 83.2 176.2 83.2 176.1H102.1ZM102.3 175.8H83C82.9 176.1 82.9 176.4 82.9 176.8H102.8C102.6 176.5 102.4 176.1 102.3 175.8Z" fill="white" />
                                        </g>
                                        <g id="Group_18" opacity="0.25">
                                            <path id="Vector_90" opacity="0.25" d="M104.2 180.7C104.3 180.9 104.3 181 104.4 181.2H83.1C83.1 181 83.1 180.9 83.1 180.7H104.2ZM104.3 180.5H82.8C82.8 180.8 82.8 181.1 82.8 181.5H104.7C104.6 181.1 104.4 180.8 104.3 180.5Z" fill="white" />
                                        </g>
                                        <g id="Group_19" opacity="0.25">
                                            <path id="Vector_91" opacity="0.25" d="M105.9 185.3L106 185.7L106.1 185.9H83.3C83.3 185.7 83.3 185.6 83.3 185.4H105.9V185.3ZM106 185.1H83C83 185.4 83 185.7 83 186.1H106.4C106.3 185.8 106.1 185.4 106 185.1Z" fill="white" />
                                        </g>
                                        <g id="Group_20" opacity="0.25">
                                            <path id="Vector_92" opacity="0.25" d="M97.6 189.9C97.5 190.1 97.5 190.3 97.4 190.4H83.1C83.1 190.2 83.1 190.1 83.1 189.9H97.6ZM97.9 189.7H82.9C82.9 190 82.9 190.3 82.8 190.7H97.5C97.7 190.4 97.8 190 97.9 189.7Z" fill="white" />
                                        </g>
                                        <g id="Group_21" opacity="0.25">
                                            <path id="Vector_93" opacity="0.25" d="M110.2 189.9C110.8 190.1 111.4 190.2 111.9 190.4L112.1 190.5H101.5C101.4 190.3 101.3 190.2 101.2 190H110.2V189.9ZM110.2 189.7H100.7C100.9 190 101.1 190.4 101.3 190.7H113.7C113.3 190.6 112.9 190.4 112.3 190.3C111.8 190.1 111 189.9 110.2 189.7Z" fill="white" />
                                        </g>
                                        <g id="Group_22" opacity="0.25">
                                            <path id="Vector_94" opacity="0.25" d="M96.9 194.6C96.9 194.6 96.9 194.7 97 194.7V194.8C97 194.9 97.1 195 97.1 195.1H82.2C82.3 194.9 82.4 194.8 82.4 194.6H96.9V194.6ZM97 194.3H82.2C82.1 194.7 81.9 195 81.8 195.3H97.4C97.3 195.1 97.2 194.9 97.1 194.7C97.1 194.6 97.1 194.5 97 194.3Z" fill="white" />
                                        </g>
                                        <g id="Group_23" opacity="0.25">
                                            <path id="Vector_95" opacity="0.25" d="M114.1 194.6C114 194.9 113.9 195 113.9 195C113.9 195 113.9 195 113.8 195C113.6 195 113.1 195 112.4 194.9C111.8 194.8 111.2 194.7 110.5 194.6H114.1V194.6ZM114.4 194.3H107.8C109.4 194.6 111.2 194.9 112.4 195C113.1 195.1 113.6 195.1 113.8 195.1C113.9 195.1 113.9 195.1 114 195.1C114.1 195.1 114.2 194.8 114.3 194.5C114.4 194.5 114.4 194.4 114.4 194.3Z" fill="white" />
                                        </g>
                                        <g id="Group_24" opacity="0.25">
                                            <path id="Vector_96" opacity="0.25" d="M97.8 199.2C97.5 199.4 97.1 199.5 96.7 199.7H80.4L80.3 199.6L80.1 199.8L80.2 199.6C80.1 199.5 80 199.4 80 199.2H97.8ZM98.5 199H79.7C79.7 199.3 79.8 199.5 80 199.8C80.1 199.9 80.1 199.9 80.2 200H96.7C97.4 199.7 97.9 199.4 98.3 199.2C98.4 199.1 98.4 199 98.5 199Z" fill="white" />
                                        </g>
                                    </g>
                                    <path id="Vector_97" d="M99.9 242.3C99.8 242.5 99.8 242.7 99.7 242.8C98.6 244.7 95.6 244.9 94.5 244.5C94.4 244.5 94.2 244.4 94.2 244.3C93.5 243.7 93 238.9 89.4 211.7C89.4 211.8 89.4 211.8 89.4 211.9C89.3 215.8 88.5 222.6 87.7 228.9C86.8 235.9 85.8 242.2 85.6 243.2C85.6 243.5 85.4 243.8 85.2 244.1C84.2 245.2 81.7 245.5 80.2 243.7C80.1 243.6 80 243.4 79.9 243.2C80.5 238.2 80.8 222.8 79.8 213.6C79.4 210.2 79.4 207.2 79.5 204.8C79.6 202.3 79.9 200.5 80.1 199.5C83.9 203.3 93.1 201.3 97 199.6C97.6 199.3 98 199.1 98.3 198.9C99.3 203.5 98.9 216.4 99.9 242.3Z" fill="#2F1829" />
                                    <path id="Vector_98" opacity="0.25" d="M97.1 170.7C90.7 170.9 88.9 180.8 88.9 180.8L87.4 170.4C89.8 169 91 169.2 91 169.2C91 169.2 94.1 169.4 97.1 170.7Z" fill="black" />
                                    <path id="Vector_99" d="M107.2 251C107.2 251 96.3 251 94.5 251C94.4 250.6 94.4 250.1 94.4 249.5C94.4 249.3 94.4 249.1 94.4 248.8C94.4 247.3 94.4 245.5 94.5 244.6C94.8 244.7 95.2 244.8 95.7 244.7C96.7 244.7 97.9 244.4 98.8 243.8C99.1 243.6 99.4 243.2 99.6 242.9C100.4 244.6 102 245.7 103.5 246.5C104.8 247.2 106.1 247.7 106.6 248.1C107.1 248.5 107.3 249 107.3 249.5C107.5 250.2 107.2 251 107.2 251Z" fill="#1F3247" />
                                    <path id="Vector_100" d="M85.3 249.5C85.3 250.5 85.2 251 85.2 251H77.9C78 250.5 78.1 250 78.2 249.5C78.8 247 79.7 244.8 80.1 243.9C80.6 244.5 81.2 244.8 81.8 245C82.5 245.2 83.2 245.2 83.9 245C84.4 244.8 84.9 244.6 85.2 244.2C85.4 246.3 85.3 248.2 85.3 249.5Z" fill="#1F3247" />
                                    <path id="Vector_101" opacity="0.25" d="M98.7 198.7C98.7 198.8 98.5 199 98.3 199.1C96 200.7 84.4 204.1 80.1 199.7C79.5 199.1 79.8 198.5 80.3 197.8C80.9 198.3 82 198.8 84 199.2C87.9 199.8 94.7 198.8 98 196.4C98.4 197.4 98.8 198.2 98.7 198.7Z" fill="black" />
                                    <g id="girllight">
                                        <path id="Vector_102" d="M121.8 188C121.8 188 119.4 179.3 124.5 173.8C129.6 168.3 143.5 160.1 143.8 149.9C144.1 139.7 151.7 126.9 161.8 124.5C171.9 122.2 179.6 98.8 188.7 94.2C197.8 89.5 210.7 89.1 214.4 83.2C218.1 77.3 261.7 162 259.6 170.7C257.4 179.4 218.6 168.2 208.2 170.8C197.8 173.4 192.9 179.6 181.3 181.2C169.7 182.8 152.5 180 146.5 183.4C140.5 186.8 129.4 191.8 123.9 189.8C121.6 188.8 121.8 188 121.8 188Z" fill="url(#paint17_linear)" />
                                        <path id="Vector_103" d="M123.9 189.6L121.4 187.1C121 186.7 120.4 186.9 120.3 187.4L119.7 189.6L114.4 194.9C114.2 195.1 114.2 195.5 114.4 195.7L115.2 196.5C115.4 196.7 115.8 196.7 116 196.5L121.3 191.2L123.5 190.6C124.1 190.6 124.3 190 123.9 189.6Z" fill="#2F1829" />
                                        <path id="Vector_104" d="M121.2 192.6C121.1 193.4 118.2 195.9 117.3 195.7C117.2 195.7 117 195.6 116.9 195.5C116.3 195.2 115.6 194.6 114.4 194.5C114.6 193.5 114.7 191.7 114.6 191.1C114.8 191 115 190.9 115.2 190.8C116.2 190.4 117.5 189.8 118 189.9C118.9 190.2 121.4 191.8 121.2 192.6Z" fill="url(#paint18_linear)" />
                                        <path id="Vector_105" opacity="0.25" d="M114.4 194.6C114.3 195 114.2 195.2 114.1 195.2C114 195.2 113.4 195.2 112.5 195.1C113.1 192.8 112.7 191.1 112.5 190.3C113.6 190.6 114.4 190.8 114.5 191C114.5 191 114.5 191.1 114.6 191.2C114.7 191.8 114.6 193.6 114.4 194.6Z" fill="black" />
                                    </g>
                                    <path id="Vector_106" opacity="0.25" d="M97.2 194.7C95.7 193.3 96.4 192.1 97.2 189.3C98 186.4 96.4 185.2 96.1 182C95.8 178.8 96.2 177 98.1 174.9C95.7 181.1 98.7 186 98.7 186C98.7 186 98.6 189.4 97.1 191.6C96.5 192.4 96.7 193.6 97.2 194.7Z" fill="black" />
                                    <path id="Vector_107" opacity="0.25" d="M97.9 164.4C97.1 166.2 95.8 168.2 95.5 168.3C95.1 168.4 94.9 165.1 93.7 164.9C92.5 164.6 92.3 166.9 93.1 167.7C93.5 168.1 93.2 169 92.6 169.8C91.9 170.6 90.9 171.2 89.8 170.5C87.8 169.3 87.4 161.5 87.4 160.9C87.4 160.9 87.4 160.4 87.5 159.7C88.5 159.6 90.8 159.8 91.3 161.8C91.8 163.8 91.8 164.7 91.8 165.1C91.9 164.5 92.4 162.8 94.3 163.2C95.4 163.3 96.7 164.1 97.9 164.4Z" fill="black" />
                                    <g id="hairgirl">
                                        <path id="Vector_108" d="M89.6 161.6C89.6 161.6 88.8 159.9 86.1 160.4C83.5 160.9 82.3 164.3 83.5 169.8C83.5 164.9 84.2 163.8 84.2 163.8C84.2 163.8 83.1 166.8 84.5 173.5C85.9 180.2 86.8 186.7 83.2 189.5C90.3 185.5 90.8 180.7 90.3 174.9C90 169.1 91.3 164 89.6 161.6Z" fill="#2F1829" />
                                    </g>
                                    <path id="Vector_109" opacity="0.25" d="M93.9 167.5C93.8 167.9 95.2 169.8 96.7 170.2C96.7 170.2 96.7 170.3 96.6 170.3C96.6 170.4 96.5 170.4 96.5 170.5C95.1 170 93.7 169.6 92.7 169.5C93.2 168.8 93.4 168 93 167.6C92.2 166.8 92.4 164.5 93.6 164.8C94.8 165.1 95 168.3 95.4 168.2C95.7 168.1 97.5 165.3 98.2 163.3C98.2 163.3 98.1 164.3 98 165.5C97.6 166.2 96.7 167.7 96 168.3C95.1 169.1 94.7 168.1 94.5 167.5C94.4 167 94 167 93.9 167.5Z" fill="black" />
                                    <path id="Vector_110" opacity="0.25" d="M81.5 204.9C81.5 204.9 81.3 208.6 81.8 209.6C82.3 210.6 83.7 211.3 83.7 211.3C83.7 211.3 85.5 210.5 86 209.4C86.5 207.2 86.4 204.5 86.4 204.5C86.4 204.5 82.8 203.7 81.5 204.9Z" stroke="white" stroke-width="0.4635" stroke-miterlimit="10" />
                                    <path id="Vector_111" opacity="0.25" d="M97.2 201.9C97.2 201.9 97.4 205 94.7 206.5" stroke="white" stroke-width="0.4635" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                    <path id="Vector_112" opacity="0.25" d="M96.5 204.6L98.7 241.6" stroke="white" stroke-width="0.4635" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                    <path id="Vector_113" opacity="0.25" d="M89.3 212C89.2 215.9 88.4 222.7 87.6 229.1C87.5 221.7 86.4 212.6 86.8 211.1C87.9 212.1 89.3 212 89.3 212Z" fill="black" />
                                    <path id="Vector_114" opacity="0.25" d="M87.4 213L84.3 243.2" stroke="white" stroke-width="0.4635" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                    <path id="Vector_115" opacity="0.25" d="M96.9 199.9C95.1 201.7 89.5 206.1 79.4 205.1C79.5 202.6 79.8 200.8 80 199.8C83.8 203.6 93.1 201.5 96.9 199.9Z" fill="black" />
                                    <path id="Vector_116" opacity="0.25" d="M78.3 249.5H85.3C85.3 250.5 85.2 251 85.2 251H77.9C78 250.5 78.1 250 78.3 249.5Z" fill="black" />
                                    <path id="Vector_117" opacity="0.25" d="M107.2 251C107.2 251 96.3 251 94.5 251C94.4 250.6 94.4 250.1 94.4 249.5H107.4C107.5 250.2 107.2 251 107.2 251Z" fill="black" />
                                    <path id="Vector_118" opacity="0.25" d="M103.6 246.4C101.3 247.5 99.7 245.2 98.9 243.7C99.2 243.5 99.5 243.1 99.7 242.8C100.5 244.5 102.1 245.6 103.6 246.4Z" fill="white" />
                                    <path id="Vector_119" opacity="0.25" d="M83.9 245C83.7 248.4 82.5 248.5 81.9 248.1C81.3 247.8 81.7 245.6 81.9 244.9C82.5 245.2 83.2 245.2 83.9 245Z" fill="black" />
                                    <path id="Vector_120" opacity="0.25" d="M94.4 248.8C94.4 247.3 94.4 245.5 94.5 244.6C94.8 244.7 95.2 244.8 95.7 244.7C95.9 245.8 96 248.3 94.4 248.8Z" fill="black" />
                                    <path id="Vector_121" opacity="0.25" d="M114.4 194.6C114.6 193.6 114.7 191.8 114.6 191.2C114.8 191.1 115 191 115.2 190.9C115.8 191.8 116.9 193.5 117 195.5C116.3 195.2 115.7 194.6 114.4 194.6Z" fill="black" />
                                    <path id="Vector_122" opacity="0.25" d="M109.1 189.4C107.1 189.6 105.7 191.7 105.6 191.3C105.4 190.8 106.5 189.8 106.4 189.1C106.3 188.4 103.2 180.5 101.5 176.6C100.5 174.2 99.5 172.6 98.9 171.6C99.2 171.8 99.5 172 99.7 172.2C100.4 172.7 100.9 173.3 101.4 174C101.7 174.5 102.1 175.2 102.4 175.8C102.6 176.1 102.7 176.4 102.9 176.8C103.4 178 104 179.2 104.5 180.4C104.6 180.7 104.8 181.1 104.9 181.4C105.4 182.7 105.9 184 106.2 185C106.3 185.3 106.4 185.7 106.5 186C106.9 187.1 107.1 187.8 107.2 188.1C107.2 188.6 108 189 109.1 189.4Z" fill="white" />
                                </g>
                            </g>
                            <path id="Vector_123" d="M592.4 253C591.7 252.5 570.9 196.3 594.9 164.3C591.6 186.9 593.4 205.4 593.4 205.4L590.3 208.5L593.8 209.5C593.8 209.5 596.1 240.9 597.3 244.5C594.7 221 601.1 207.3 601.1 207.3C601.1 207.3 600 224 602.1 230.1L600.4 232.3L602.1 232C602.1 232 600.9 242.1 602.1 245.1C602.1 245.1 615.5 205.1 609.2 187.5C617.5 200.3 615.1 221.8 615.1 221.8L613 222.6L614.3 223.6C614.3 223.6 610.8 246.5 602.9 252.9" fill="#2F1829" />
                            <g id="Group_25">
                                <path id="Vector_124" d="M452.1 246.4C452.1 246.4 433.5 244.7 426.1 249.9C429.6 244.9 443.7 242.6 443.7 242.6L444.7 243.4V242.6C444.7 242.6 447.1 241.4 450.6 240.9C433.7 237.6 425.6 240.8 425.6 240.8C425.6 240.8 428.7 238.2 433.9 236.7C439.1 235.2 442.3 235.8 442.3 235.8L444.4 237.1V235.7L462.4 241" fill="black" />
                                <path id="Vector_125" d="M523.5 247.4C523.5 247.4 521.5 234.8 531.8 226.1C531.7 236.3 528.9 245 523.5 247.4Z" stroke="#1F3247" stroke-width="0.9271" stroke-miterlimit="10" />
                                <g id="Group_26">
                                    <path id="Vector_126" d="M454.5 239.1L452.5 244C451.1 239.1 448 238.1 446.4 238C445.8 237.9 445.5 238 445.5 238L446.2 235.6L443.9 236C443.9 236 441.3 229.7 429.6 222C440.3 221.4 446.9 227 450.6 232C453.4 235.7 454.5 239.1 454.5 239.1Z" fill="#FFCA51" />
                                    <g id="Group_27" opacity="0.25">
                                        <path id="Vector_127" opacity="0.25" d="M429.6 222C432.1 222.6 434.6 223.5 437 224.6C439.4 225.7 441.7 226.9 443.9 228.3C446.1 229.8 448.1 231.5 449.9 233.5C451.6 235.5 453 237.8 454 240.3C454 240.4 454 240.6 453.9 240.6C453.8 240.6 453.6 240.6 453.6 240.5C452.7 238.1 451.4 235.8 449.7 233.8C448 231.8 446 230.1 443.9 228.6C441.7 227.1 439.4 225.9 437 224.8C434.6 223.6 432.1 222.6 429.6 222Z" fill="white" />
                                    </g>
                                    <path id="Vector_128" opacity="0.25" d="M454.5 239.1L452.5 244C451.1 239.1 448 238.1 446.4 238C449.2 236.3 450.2 233.6 450.6 231.9C453.4 235.7 454.5 239.1 454.5 239.1Z" fill="black" />
                                </g>
                                <g id="Group_28">
                                    <path id="Vector_129" d="M531.8 215.8C512.6 231.6 507.7 239.4 507.7 239.4L504.3 237.9C504.3 237.9 504.3 238 504.3 238.2C504.3 239.1 504.4 241.5 504.3 242.4C504.2 243.1 497.4 246.8 493.5 248.8C491.9 249.6 490.9 250.2 490.9 250.2L487.7 247L488 246.4L489.7 243.2C489.7 243.2 494.1 236.9 501.6 230.3C508.9 223.7 519.4 216.9 531.8 215.8Z" fill="#FFADAE" />
                                    <g id="Group_29" opacity="0.25">
                                        <path id="Vector_130" opacity="0.25" d="M489.6 248.9C492.2 245.1 495.1 241.5 498.1 238.1C501.1 234.7 504.4 231.4 507.8 228.4C511.3 225.4 515 222.7 519 220.4C523 218.2 527.3 216.5 531.8 215.7C527.3 216.5 523 218.2 519 220.5C515 222.8 511.4 225.5 507.9 228.5C504.5 231.5 501.3 234.8 498.3 238.2C495.3 241.6 492.5 245.2 489.9 249C489.8 249.1 489.7 249.1 489.6 249.1C489.5 249.2 489.5 249 489.6 248.9Z" fill="white" />
                                    </g>
                                    <path id="Vector_131" opacity="0.25" d="M504.3 242.3C504.2 243 497.4 246.7 493.5 248.7C491.4 247.9 489.4 247 488 246.2L489.7 243C489.7 243 494.1 236.7 501.6 230.1C502 232.4 502.9 235.7 504.4 238.1C504.3 239 504.4 241.5 504.3 242.3Z" fill="black" />
                                </g>
                                <g id="Group_30">
                                    <path id="Vector_132" d="M519.7 205.4C506 216.8 499.7 226.4 497.1 231.2C495.9 233.4 495.5 234.7 495.5 234.7L492.5 233.6L493.7 236.3L489.3 245.1L487.4 249V233.6C488 232.5 488.8 231 489.8 229.3C491.7 226.1 494.4 222.2 497.9 218.4C499.5 216.7 501.2 215 503 213.4C507.8 209.6 513.3 206.5 519.7 205.4Z" fill="#F3475C" />
                                    <g id="Group_31" opacity="0.25">
                                        <path id="Vector_133" opacity="0.25" d="M487.3 239.8C488.7 236 490.6 232.4 492.7 228.9C494.8 225.4 497.3 222.2 500 219.2C502.7 216.2 505.8 213.5 509.1 211.1L511.6 209.4L514.3 207.9C514.7 207.7 515.2 207.4 515.6 207.2L517 206.6L519.8 205.4L517 206.6L515.6 207.2C515.2 207.4 514.7 207.7 514.3 207.9L511.7 209.4L509.2 211.1C505.9 213.5 502.9 216.2 500.2 219.2C497.5 222.2 495.1 225.5 493.1 229C491 232.5 489.2 236.1 487.9 239.9C487.9 240 487.7 240.1 487.6 240C487.3 240.1 487.3 239.9 487.3 239.8Z" fill="white" />
                                    </g>
                                    <path id="Vector_134" opacity="0.25" d="M495.6 234.8L492.6 233.7L493.8 236.4L489.4 245.2L487.5 245.5V233.7C488.1 232.6 488.9 231.1 489.9 229.4C491.3 230.5 493.7 231.8 497.1 231.3C496 233.5 495.6 234.8 495.6 234.8Z" fill="black" />
                                </g>
                                <path id="Vector_135" d="M537.2 251.1H487.5V244.1C487.5 244.1 488.2 242.4 490.2 241.4C490.8 241.1 491.6 240.8 492.4 240.7C496.1 240.2 497.4 243.3 497.4 243.3C497.4 243.3 498.3 240.6 502 240.3C505.6 240 507.8 245.6 507.9 246C507.9 245.7 507.6 242.6 510.4 242.4C513.3 242.2 513.3 246 513.3 246C513.3 246 515.6 243.5 518.6 243.6C521.6 243.8 522.2 246.7 522.2 246.7C522.2 246.7 523.9 244.2 527.5 245.1C531.2 245.9 531.7 251.1 537.2 251.1Z" fill="#982245" />
                                <path id="Vector_136" opacity="0.25" d="M521.7 251.1H487.6V244.1C487.6 244.1 488.3 242.4 490.3 241.4C491.8 241.5 494.4 242 495.5 244C497.1 246.9 497.2 249.6 497.2 249.6C497.2 249.6 500.5 244.8 503.2 245.6C505.9 246.4 507.3 249.6 507.3 249.6C507.3 249.6 510.1 246.6 512.5 247.6C513.6 248.2 517.8 249.7 521.7 251.1Z" fill="black" />
                                <path id="Vector_137" d="M423.7 253C423.5 252.9 417.7 237.1 424.4 228.1C423.5 234.5 424 239.7 424 239.7L423.1 240.6L424.1 240.9C424.1 240.9 424.8 249.7 425.1 250.8C424.4 244.2 426.2 240.3 426.2 240.3C426.2 240.3 425.9 245 426.5 246.7L426 247.3L426.5 247.2C426.5 247.2 426.2 250 426.5 250.9C426.5 250.9 430.3 239.7 428.5 234.7C430.8 238.3 430.2 244.3 430.2 244.3L429.6 244.5L430 244.8C430 244.8 429 251.2 426.8 253" fill="#2F1829" />
                            </g>
                            <g id="Group_32">
                                <path id="Vector_138" d="M197 247.9C197 247.9 167.7 228.2 150.6 230C161 224.9 186.5 233.9 186.5 233.9L187.5 236.2L188.2 234.9C188.2 234.9 193.3 235 199.5 237.5C174.5 216.5 158.1 214.5 158.1 214.5C158.1 214.5 165.6 213.1 175.6 215.3C185.6 217.5 190.4 221.5 190.4 221.5L192.7 225.5L193.9 223.3L218.9 248.5" fill="black" />
                                <path id="Vector_139" d="M174.2 250.2C174.2 250.2 161.8 247.6 154.1 238.3C167.3 239.7 173 244.4 174.2 250.2Z" stroke="#1F3247" stroke-width="0.9271" stroke-miterlimit="10" />
                                <g id="Group_33">
                                    <path id="Vector_140" d="M215.5 194.6C214.4 219.4 217 228.3 217 228.3L213.6 229.9C213.6 229.9 213.7 230 213.8 230.1C214.5 230.7 216.3 232.3 216.9 232.9C217.4 233.4 215.6 241 214.5 245.2C214.1 246.9 213.8 248.1 213.8 248.1L209.3 248.3L209.1 247.6L207.8 244.2C207.8 244.2 206 236.7 206.1 226.8C206.1 216.9 208.1 204.5 215.5 194.6Z" fill="#FFADAE" />
                                    <g id="Group_34" opacity="0.25">
                                        <path id="Vector_141" opacity="0.25" d="M212 248.1C210.9 243.6 210.2 239.1 209.6 234.6C209.1 230 208.8 225.5 208.9 220.9C209 216.3 209.4 211.7 210.4 207.3C211.4 202.8 213 198.5 215.5 194.6C213.1 198.5 211.5 202.8 210.5 207.3C209.5 211.8 209.1 216.3 209.1 220.9C209 225.5 209.4 230 209.9 234.6C210.5 239.1 211.3 243.6 212.4 248.1C212.4 248.2 212.4 248.4 212.2 248.4C212.2 248.3 212 248.3 212 248.1Z" fill="white" />
                                    </g>
                                    <path id="Vector_142" opacity="0.25" d="M216.9 232.8C217.4 233.3 215.6 240.9 214.5 245.1C212.5 246.2 210.5 247 209 247.6L207.7 244.2C207.7 244.2 205.9 236.7 206 226.8C208 228 211 229.5 213.8 230C214.4 230.6 216.3 232.2 216.9 232.8Z" fill="black" />
                                </g>
                                <g id="Group_35">
                                    <path id="Vector_143" d="M233 211.6C226.9 222.3 225.1 230 224.6 233.7C224.4 235.4 224.4 236.3 224.4 236.3H222.2L223.6 237.8L222.9 244.6L222.6 247.6L218.9 237.7C219 236.8 219.2 235.7 219.4 234.3C219.9 231.8 220.7 228.6 222 225.3C222.6 223.8 223.3 222.3 224.1 220.9C226.3 217.2 229.1 213.9 233 211.6Z" fill="#F3475C" />
                                    <g id="Group_36" opacity="0.25">
                                        <path id="Vector_144" opacity="0.25" d="M220.2 241.7C220.2 238.9 220.5 236.1 221.1 233.3C221.6 230.5 222.4 227.9 223.5 225.3C224.5 222.7 225.9 220.2 227.4 217.9L228.6 216.2L230 214.6C230.2 214.3 230.5 214.1 230.7 213.8L231.5 213.1L233 211.7L231.5 213.2L230.8 213.9C230.6 214.2 230.3 214.4 230.1 214.7L228.8 216.3L227.6 218C226.1 220.3 224.7 222.8 223.8 225.4C222.8 228 222.1 230.7 221.5 233.4C221 236.1 220.7 238.9 220.7 241.7C220.7 241.8 220.6 241.9 220.5 241.9C220.3 241.9 220.2 241.8 220.2 241.7Z" fill="white" />
                                    </g>
                                    <path id="Vector_145" opacity="0.25" d="M224.4 236.4H222.2L223.6 237.9L222.9 244.7L221.7 245.3L218.9 237.7C219 236.8 219.2 235.7 219.4 234.3C220.5 234.7 222.4 235 224.5 233.8C224.4 235.5 224.4 236.4 224.4 236.4Z" fill="black" />
                                </g>
                                <path id="Vector_146" d="M254 251H241.6L187.6 251.1H171.6C171.6 251.1 172.9 246.8 179.2 244.8C185.5 242.8 187.3 246.9 187.3 246.9C187.3 246.9 187 238.7 194.4 235.9C201.8 233.1 205.1 242.5 205.1 242.5C205.1 242.5 206.6 237.9 214.5 237.5C222.4 237.1 221.6 243.3 221.6 243.3C221.6 243.3 226.1 238.3 234.2 239.4C242.3 240.5 243.1 247 243.1 247C243.1 247 250.2 244.8 254 251Z" fill="#982245" />
                                <path id="Vector_147" opacity="0.25" d="M241.6 251L187.6 251.1C190.4 248.6 195 245.4 199.8 245.3C207.7 245.2 209 248.1 209 248.1C209 248.1 213.9 242.9 217.7 243.8C221.6 244.7 221.7 248.8 221.7 248.8C221.7 248.8 234.1 245.9 241.6 251Z" fill="black" />
                                <path id="Vector_148" d="M262.9 254.5C262.9 254.5 253.9 238.6 256.6 223.2C259.2 235.3 265.7 243.3 265.7 243.3L263.1 245.4H265.7L271.3 256.1L263.7 254.5V255.2L262.9 254.5Z" fill="#2F1829" />
                            </g>
                        </g>
                        <defs>
                            <linearGradient id="paint0_linear" x1="327.54" y1="250.471" x2="330.184" y2="46.9149" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#E8D197" />
                                <stop offset="1" stop-color="#FEF5DA" />
                            </linearGradient>
                            <linearGradient id="paint1_linear" x1="326.925" y1="147.902" x2="330.395" y2="242.079" gradientUnits="userSpaceOnUse">
                                <stop />
                                <stop offset="1" stop-opacity="0" />
                            </linearGradient>
                            <linearGradient id="paint2_linear" x1="344.3" y1="64.1527" x2="344.961" y2="87.284" gradientUnits="userSpaceOnUse">
                                <stop stop-color="white" />
                                <stop offset="1" stop-color="white" stop-opacity="0" />
                            </linearGradient>
                            <linearGradient id="paint3_linear" x1="130.102" y1="26.1247" x2="132.084" y2="77.0139" gradientUnits="userSpaceOnUse">
                                <stop stop-color="white" />
                                <stop offset="1" stop-color="white" stop-opacity="0" />
                            </linearGradient>
                            <linearGradient id="paint4_linear" x1="455.752" y1="229.215" x2="433.942" y2="41.3544" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#E8D197" />
                                <stop offset="1" stop-color="#FEF5DA" />
                            </linearGradient>
                            <linearGradient id="paint5_linear" x1="60.0761" y1="430.474" x2="23.3198" y2="113.867" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#E8D197" />
                                <stop offset="1" stop-color="#FEF5DA" />
                            </linearGradient>
                            <linearGradient id="paint6_linear" x1="197.311" y1="242.736" x2="195.989" y2="148.447" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#2F1829" />
                                <stop offset="1" stop-color="#3B223C" />
                            </linearGradient>
                            <linearGradient id="paint7_linear" x1="322.636" y1="240.979" x2="321.314" y2="146.691" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#2F1829" />
                                <stop offset="1" stop-color="#3B223C" />
                            </linearGradient>
                            <linearGradient id="paint8_linear" x1="447.456" y1="239.229" x2="446.134" y2="144.941" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#2F1829" />
                                <stop offset="1" stop-color="#3B223C" />
                            </linearGradient>
                            <linearGradient id="paint9_linear" x1="281.068" y1="73.4007" x2="292.303" y2="109.089" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#2F1829" />
                                <stop offset="1" stop-color="#3B223C" />
                            </linearGradient>
                            <linearGradient id="paint10_linear" x1="567.282" y1="246.761" x2="567.144" y2="239.051" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#FECBA6" />
                                <stop offset="1" stop-color="#D17878" />
                            </linearGradient>
                            <linearGradient id="paint11_linear" x1="575.336" y1="236.543" x2="417.383" y2="126.175" gradientUnits="userSpaceOnUse">
                                <stop stop-color="white" />
                                <stop offset="1" stop-color="white" stop-opacity="0" />
                            </linearGradient>
                            <linearGradient id="paint12_linear" x1="529.726" y1="200.324" x2="554.29" y2="176.972" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#FECBA6" />
                                <stop offset="1" stop-color="#D17878" />
                            </linearGradient>
                            <linearGradient id="paint13_linear" x1="568.688" y1="209.407" x2="569.018" y2="182.751" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#FECBA6" />
                                <stop offset="1" stop-color="#D17878" />
                            </linearGradient>
                            <linearGradient id="paint14_linear" x1="552.343" y1="166.843" x2="558.043" y2="168.082" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#FECBA6" />
                                <stop offset="1" stop-color="#D17878" />
                            </linearGradient>
                            <linearGradient id="paint15_linear" x1="550.457" y1="250.958" x2="552.881" y2="239.337" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#FECBA6" />
                                <stop offset="1" stop-color="#D17878" />
                            </linearGradient>
                            <linearGradient id="paint16_linear" x1="95.6885" y1="163.838" x2="93.7609" y2="174.468" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#FECBA6" />
                                <stop offset="1" stop-color="#D17878" />
                            </linearGradient>
                            <linearGradient id="paint17_linear" x1="75.5473" y1="236.543" x2="233.501" y2="126.174" gradientUnits="userSpaceOnUse">
                                <stop stop-color="white" />
                                <stop offset="1" stop-color="white" stop-opacity="0" />
                            </linearGradient>
                            <linearGradient id="paint18_linear" x1="124.267" y1="190.961" x2="113.114" y2="194.142" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#FECBA6" />
                                <stop offset="1" stop-color="#D17878" />
                            </linearGradient>
                        </defs>
                    </svg>
                </div>
            </div>
        </div>
    </a>
    <script>
        anime({
            targets: '.row svg'
            , translateY: 10
            , autoplay: true
            , loop: true
            , easing: 'easeInOutSine'
            , direction: 'alternate'
        });

        anime({
            targets: '#zero'
            , translateX: 10
            , autoplay: true
            , loop: true
            , easing: 'easeInOutSine'
            , direction: 'alternate'
            , scale: [{
                value: 1
            }, {
                value: 1.4
            }, {
                value: 1
                , delay: 250
            }]
            , rotateY: {
                value: '+=180'
                , delay: 200
            }
        , });

    </script>
</div>
@endunlessrole
@endsection
