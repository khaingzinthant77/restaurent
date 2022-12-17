@extends('adminlte::page')

@section('title', 'Account')

@section('content_header')
    <h5 style="color: #fb5849;">Update Password</h5>
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
          <form action="{{route('update_password')}}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('post')
          <div class="row form-group">
            
            <!-- <div class="col-lg-6 col-sm-12 form-group">
              <fieldset>
                <label>Old Password</label>
                <input name="old_password" type="password" id="old_password" placeholder="Old Password" required="" class="form-control" required>
                <span class="help-block">
                    <small>{{ $errors->first('old_password') }}</small>
                </span>
              </fieldset>
            </div> -->
            <div class="col-lg-6 col-sm-12 form-group">
              <fieldset>
                <label>New Password</label>
                <input name="new_password" type="password" id="new_password" placeholder="New Password" class="form-control">
                <span class="help-block">
                    <small>{{ $errors->first('new_password') }}</small>
                </span>
            </fieldset>
            </div>
           
            <div class="col-lg-12">
              <fieldset>
                <button type="submit" id="form-submit" class="btn" style="background:#fb5849;color: white;">Update</button>
              </fieldset>
            </div>
          </div>
        </form>
    </div>
@stop 

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-awesome.css')}}">
<style type="text/css">
  .error_msg{
        color: #DD4B39;
      }
      .has-error input{
        border-color: #DD4B39;
      }
      .help-block{
        color: #DD4B39;
      }

</style>
@stop

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

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