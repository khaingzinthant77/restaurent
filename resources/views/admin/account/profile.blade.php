@extends('adminlte::page')

@section('title', 'Profile')

@section('content_header')
    <h5 style="color: #fb5849;">Profile</h5>
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
          <div>
            <label>Name :</label>
            <label>{{$data->name}}</label>
          </div>
          <div>
            <label>Email :</label>
            <label>{{$data->email}}</label>
          </div>
    </div>
@stop 

@section('css')

<link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-awesome.css')}}">

@stop

@section('js')

<script> 

     </script>
@stop