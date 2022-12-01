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
                </tr>
            </thead>
            <tbody>
                @if($reservations->count() > 0)
                @foreach($reservations as $key=>$reservation)
                <tr class="table-tr" data-url="{{route('reservations.show',$reservation->id)}}" style="cursor: pointer;">
                    <td>{{++$i}}</td>
                    <td>{{$reservation->name}}</td>
                    <td>{{$reservation->email}}</td>
                    <td>{{$reservation->phone_no}}</td>
                    <td>{{$reservation->num_of_guest}}</td>
                    <td>{{date('d-m-Y',strtotime($reservation->date))}}</td>
                    <td>{{$reservation->time}}</td>
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
              $('table').on("click", "tr.table-tr", function() {
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
     </script>
@stop