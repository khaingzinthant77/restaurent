@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h5 style="color: #fb5849;">Dashboard</h5>
    <style type="text/css">
        .card {
          box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
          transition: 0.3s;
/*          width: 40%;*/
        }

        .card:hover {
          box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        }

        /*.table-tr tr {
            cursor: pointer;
        }*/
    </style>
@stop
@section('content')

    <div class="card">
        <div class="row" style="padding: 10px;">
        <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box" style="background:#ddffff;">
                <div class="inner">
                    <h3>{{ $today_reservation}}</h3>

                    <p>Today Reservation</p>
                </div>
                <div class="icon">
                    <i class="fa fa-users "></i>
                </div>
                <a href="{{ url("/reservations?from_date=".date('d.m.Y').'&to_date='.date('d.m.Y')) }}" class="small-box-footer" style="color:black;">More info <i
                        class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box" style="background:#f1defe">
                <div class="inner">
                    <h3>{{ $monthly_reservation}}</h3>

                    <p>Monthly Reservation</p>
                </div>
                <div class="icon">
                    <i class="fa fa-users "></i>
                </div>
                <a href="{{ url("/reservations?month=".date('m')) }}" class="small-box-footer" style="color:black;">More info <i
                        class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box" style="background:#dee7ff;">
                <div class="inner">
                    <h3>{{ $total_reservation}}</h3>

                    <p>Total Reservation</p>
                </div>
                <div class="icon">
                    <i class="fa fa-users "></i>
                </div>
                <a href="{{ url("/reservations") }}" class="small-box-footer" style="color:black;">More info <i
                        class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    </div>
@stop 

@section('css')

@stop

@section('js')

@stop