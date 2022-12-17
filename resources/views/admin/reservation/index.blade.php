@extends('adminlte::page')

@section('title', 'Reservation')

@section('content_header')
    <h5 style="color: #fb5849;">Reservation List</h5>
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

        .switch {
            position: relative;
            display: inline-block;
            width: 45px;
            height: 22px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 15px;
            width: 15px;
            left: 2px;
            bottom: 0px;
            top: 3px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 36px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
        table.scroll {
        margin: 4px, 4px;
        padding: 4px;
     
/*        width: 300px;*/
        overflow-x: auto;
        overflow-y: hidden;
        white-space: nowrap;
    }

    </style>
@stop
@section('content')
    <?php
        $keyword = isset($_GET['keyword'])?$_GET['keyword']:'';
        $from_date = isset($_GET['from_date'])?$_GET['from_date']:'';
        $to_date = isset($_GET['to_date'])?$_GET['to_date']:'';
    ?>
        <form action="" method="get" accept-charset="utf-8" class="form-horizontal">
            <div class="row form-group">
                <div class="col-md-11">
                    <div class="row">
                        <div class="col-md-2">
                            <input type="text" name="keyword" id="keyword" value="{{ old('keyword',$keyword) }}" class="form-control" placeholder="Search...">
                        </div>
                        <div class="col-md-2">
                            <div id="filterDate2">    
                              <div class="input-group date" data-date-format="dd/mm/yyyy">
                                <input  name="from_date" id="from_date" type="text" class="form-control" placeholder="From Date" value="{{old('from_date',$from_date)}}">
                                <div class="input-group-addon" >
                                  <span class="glyphicon glyphicon-th"></span>
                                </div>
                              </div>
                            </div> 
                        </div>
                        <div class="col-md-2">
                            <div id="filterDate2">    
                              <div class="input-group date" data-date-format="dd/mm/yyyy">
                                <input  name="to_date" id="to_date" type="text" class="form-control" placeholder="To Date" value="{{old('to_date',$to_date)}}">
                                <div class="input-group-addon" >
                                  <span class="glyphicon glyphicon-th"></span>
                                </div>
                              </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="col-md-1">
                    <a class="btn" href="{{route('reservations.create')}}" style="background: #fb5849;color: white;"><i class="fas fa-plus">Add</i></a>
                </div>
            </div>
        </form>
    <div class="card">
        <div class="table-responsive">
            <table class="table table-bordered styled-table">
                <thead style="background:#fb5849;color: white;">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone No</th>
                    <th>Number of Guests</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @if($reservations->count() > 0)
                @foreach($reservations as $key=>$reservation)
                <tr style="cursor: pointer;">
                    <td class="table-tr" data-url="{{route('reservations.show',$reservation->id)}}">{{++$i}}</td>
                    <td class="table-tr" data-url="{{route('reservations.show',$reservation->id)}}">{{$reservation->name}}</td>
                    <td class="table-tr" data-url="{{route('reservations.show',$reservation->id)}}">{{$reservation->email}}</td>
                    <td class="table-tr" data-url="{{route('reservations.show',$reservation->id)}}">{{$reservation->phone_no}}</td>
                    <td class="table-tr" data-url="{{route('reservations.show',$reservation->id)}}">{{$reservation->num_of_guest}}</td>
                    <td class="table-tr" data-url="{{route('reservations.show',$reservation->id)}}">{{date('d-m-Y',strtotime($reservation->date))}}</td>
                    <td class="table-tr" data-url="{{route('reservations.show',$reservation->id)}}">{{$reservation->time}}</td>
                    <td>
                        <label class="switch">
                            <input data-id="{{$reservation->id}}" data-size ="small" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $reservation->status ? 'checked' : '' }}>
                                  <span class="slider round"></span>
                        </label>
                    </td>
                </tr>
                @endforeach
                @else

                <tr>
                    <td colspan="7"></td>
                </tr>
                @endif
            </tbody>
            
            </table>
            <div align="center">
                <p>Total - {{$count}}</p>
          </div>
       </div>
    </div>
@stop 

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-awesome.css')}}">

<link rel="stylesheet" href="{{asset('assets/css/owl-carousel.css')}}">

<link rel="stylesheet" href="{{asset('assets/css/lightbox.css')}}">

@stop

@section('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


<script src="{{asset('assets/js/jquery-2.1.0.min.js')}}"></script>

<!-- Bootstrap -->
<script src="{{asset('assets/js/popper.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

<!-- Plugins -->
<script src="{{asset('assets/js/owl-carousel.js')}}"></script>
<script src="{{asset('assets/js/accordions.js')}}"></script>
<script src="{{asset('assets/js/datepicker.js')}}"></script>
<script src="{{asset('assets/js/scrollreveal.min.js')}}"></script>
<script src="{{asset('assets/js/waypoints.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.counterup.min.js')}}"></script>
<script src="{{asset('assets/js/imgfix.min.js')}}"></script> 
<script src="{{asset('assets/js/slick.js')}}"></script> 
<script src="{{asset('assets/js/lightbox.js')}}"></script> 
<script src="{{asset('assets/js/isotope.js')}}"></script> 

<!-- Global Init -->
<script src="{{asset('assets/js/custom.js')}}"></script>

<script> 
    @if(Session::has('success'))
            toastr.options =
            {
            "closeButton" : true,
            "progressBar" : true
            }
            toastr.success("{{ session('success') }}");
        @endif

          @if(Session::has('error'))
          toastr.options =
          {
            "closeButton" : true,
            "progressBar" : true
          }
                toastr.error("{{ session('error') }}");
          @endif

        $(document).ready(function(){
            setTimeout(function(){
            $("div.alert").remove();
            }, 1000 ); 
            $(function() {
                $('#town_name').on('change',function(e) {
                this.form.submit();
               // $( "#form_id" )[0].submit();   
            }); 
        });
        $(function() {
              $('table').on("click", "td.table-tr", function() {
                window.location = $(this).data("url");
              });
            });
            $('#from_date').change(function(){
                this.form.submit();
            });
            $('#to_date').change(function(){
                this.form.submit();
            });
        });

        $(function() {
            $('.toggle-class').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0; 
                var reservation_id = $(this).data('id'); 
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "<?php echo(route("change-status-active")) ?>",
                    data: {'status': status, 'reservation_id': reservation_id},
                    success: function(data){
                     console.log(data.success);
                    }
                });
            })
          });
     </script>
@stop