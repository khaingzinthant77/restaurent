@extends('adminlte::page')

@section('title', 'Reservation')

@section('content_header')
    <h5 style="color: #fb5849;">Create Reservation</h5>
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
    <div class="row" style="justify-content: flat-end;align-items: flex-end;justify-content: flex-end;padding-right: 20px;margin-bottom: 10px;">
      <a href="{{route('reservations.edit',$reservation->id)}}" class="btn btn-primary"><i class="far fa-fw fa-edit"></i></a>&nbsp;
      <form method="POST" action="{{ route('reservations.destroy', $reservation->id) }}">
          @csrf
          <input name="_method" type="hidden" value="DELETE">
          <button class="btn btn-danger show_confirm" type="submit"><i class="fa fa-trash text-white"></i></button>
      </form>

      
    </div>
    <div class="card">
          <div class="row form-group">
            
            <div class="col-lg-6 col-sm-12 form-group">
              <fieldset>
                <label>Name</label>
                <input name="name" type="text" id="name" placeholder="Your Name*" required="" class="form-control" required value="{{$reservation->name}}" readonly>
              </fieldset>
            </div>
            <div class="col-lg-6 col-sm-12 form-group">
              <fieldset>
                <label>Email</label>
              <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email Address" class="form-control" value="{{$reservation->email}}" readonly>
            </fieldset>
            </div>
            <div class="col-lg-6 col-sm-12 form-group">
              <fieldset>
                <label>Phone No.</label>
                <input name="phone" type="text" id="phone" placeholder="Phone Number*" required="" class="form-control" value="{{$reservation->phone_no}}" readonly>
              </fieldset>
            </div>
            <div class="col-md-6 col-sm-12 form-group">
              <fieldset>
                <label>Number of Guests</label>
                <input type="text" name="number_of_guests" class="form-control" value="{{$reservation->num_of_guest}}" readonly>
              </fieldset>
            </div>
            <div class="col-lg-6 form-group">
                <div id="filterDate2">    
                  <label>Date</label>
                  <div class="input-group date" data-date-format="dd/mm/yyyy">
                    <input  name="date" id="date" type="text" class="form-control" placeholder="dd/mm/yyyy" required value="{{date('d-m-Y',strtotime($reservation->date))}}" readonly>
                    <div class="input-group-addon" >
                      <span class="glyphicon glyphicon-th"></span>
                    </div>
                  </div>
                </div>   
            </div>
            <div class="col-md-6 col-sm-12 form-group">
              <fieldset>
                <label>Time</label>
                <!-- <select value="time" name="time" id="time" class="form-control" required>
                    <option value="time">Time</option>
                    <option name="Breakfast" id="Breakfast" {{$reservation->time == 'Breakfast' ? 'selected' : ''}}>Breakfast</option>
                    <option name="Lunch" id="Lunch" {{$reservation->time == 'Lunch' ? 'selected' : ''}}>Lunch</option>
                    <option name="Dinner" id="Dinner" {{$reservation->time == 'Dinner' ? 'selected' : ''}}>Dinner</option>
                </select> -->

                <input type="text" name="time" id="time" class="form-control" value="{{$reservation->time}}" readonly>
              </fieldset>
            </div>
            <div class="col-lg-12 form-group">
              <fieldset>
                <label>Remark</label>
                <textarea name="message" rows="6" id="message" placeholder="Remark" required="" class="form-control" readonly>{{$reservation->message}}</textarea>
              </fieldset>
            </div>
            <div class="col-lg-12">
              <fieldset>
                <!-- <button type="submit" id="form-submit" class="btn" style="background:#fb5849;color: white;">Make A Reservation</button> -->
                <a href="{{route('reservations.index')}}" class="btn" style="background:#fb5849;color: white;">Back</a>
              </fieldset>
            </div>
          </div>
        
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

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
              
            }); 
        });
        $(function() {
          $('table').on("click", "tr.table-tr", function() {
            window.location = $(this).data("url");
          });
        });

         $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              this.form.submit();
            }
          });
      });

        });
     </script>
@stop