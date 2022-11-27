@extends('adminlte::page')

@section('title', 'Reservation')

@section('content_header')
    <h5 style="color: #fb5849;">Update Reservation</h5>
    <style type="text/css">
        .card {
          box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
          transition: 0.3s;
          padding: 10px;
/*          width: 40%;*/
        }

        .card:hover {
          box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        }
    </style>
@stop
@section('content')
   
    <div class="card">
          <form action="{{route('reservations.update',$reservation->id)}}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="row form-group">
            
            <div class="col-lg-6 col-sm-12 form-group">
              <fieldset>
                <input name="name" type="text" id="name" placeholder="Your Name*" required="" class="form-control" value="{{$reservation->name}}" required>
              </fieldset>
            </div>
            <div class="col-lg-6 col-sm-12 form-group">
              <fieldset>
              <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email Address" class="form-control" value="{{$reservation->email}}">
            </fieldset>
            </div>
            <div class="col-lg-6 col-sm-12 form-group">
              <fieldset>
                <input name="phone" type="text" id="phone" placeholder="Phone Number*" required="" class="form-control" value="{{$reservation->phone_no}}">
              </fieldset>
            </div>
            <div class="col-md-6 col-sm-12 form-group">
              <fieldset>
                <select value="number_guests" name="number_guests" id="number_guests" class="form-control" required>
                    <option value="number-guests">Number Of Guests</option>
                    <option name="1" id="1" {{$reservation->num_of_guest == 1 ? 'selected' : ''}}>1</option>
                    <option name="2" id="2" {{$reservation->num_of_guest == 2 ? 'selected' : ''}}>2</option>
                    <option name="3" id="3" {{$reservation->num_of_guest == 3 ? 'selected' : ''}}>3</option>
                    <option name="4" id="4" {{$reservation->num_of_guest == 4 ? 'selected' : ''}}>4</option>
                    <option name="5" id="5" {{$reservation->num_of_guest == 5 ? 'selected' : ''}}>5</option>
                    <option name="6" id="6" {{$reservation->num_of_guest == 6 ? 'selected' : ''}}>6</option>
                    <option name="7" id="7" {{$reservation->num_of_guest == 7 ? 'selected' : ''}}>7</option>
                    <option name="8" id="8" {{$reservation->num_of_guest == 8 ? 'selected' : ''}}>8</option>
                    <option name="9" id="9" {{$reservation->num_of_guest == 9 ? 'selected' : ''}}>9</option>
                    <option name="10" id="10" {{$reservation->num_of_guest == 10 ? 'selected' : ''}}>10</option>
                    <option name="11" id="11" {{$reservation->num_of_guest == 11 ? 'selected' : ''}}>11</option>
                    <option name="12" id="12" {{$reservation->num_of_guest == 12 ? 'selected' : ''}}>12</option>
                </select>
              </fieldset>
            </div>
            <div class="col-lg-6 form-group">
                <div id="filterDate2">    
                  <div class="input-group date" data-date-format="dd/mm/yyyy">
                    <input  name="date" id="date" type="text" class="form-control" placeholder="dd/mm/yyyy" required value="{{date('d-m-Y',strtotime($reservation->date))}}">
                    <div class="input-group-addon" >
                      <span class="glyphicon glyphicon-th"></span>
                    </div>
                  </div>
                </div>   
            </div>
            <div class="col-md-6 col-sm-12 form-group">
              <fieldset>
                <select value="time" name="time" id="time" class="form-control" required>
                    <option value="time">Time</option>
                    <option name="Breakfast" id="Breakfast" {{$reservation->time == 'Breakfast' ? 'selected' : ''}}>Breakfast</option>
                    <option name="Lunch" id="Lunch" {{$reservation->time == 'Lunch' ? 'selected' : ''}}>Lunch</option>
                    <option name="Dinner" id="Dinner" {{$reservation->time == 'Dinner' ? 'selected' : ''}}>Dinner</option>
                </select>
              </fieldset>
            </div>
            <div class="col-lg-12 form-group">
              <fieldset>
                <textarea name="message" rows="6" id="message" placeholder="Remark" required="" class="form-control">{{$reservation->message}}</textarea>
              </fieldset>
            </div>
            <div class="col-lg-12">
              <fieldset>
                <button type="submit" id="form-submit" class="btn" style="background:#fb5849;color: white;">Update Reservation</button>
              </fieldset>
            </div>
          </div>
        </form>
    </div>
@stop 

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-awesome.css')}}">

<link rel="stylesheet" href="{{asset('assets/css/owl-carousel.css')}}">

<link rel="stylesheet" href="{{asset('assets/css/lightbox.css')}}">
@stop

@section('js')

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
        });
     </script>
@stop