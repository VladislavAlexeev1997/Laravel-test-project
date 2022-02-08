@extends('layouts.frame-layout')

@section('frame-header')
   <p class="card-text">Пользователь <b>{{$user_name}}</b></p>
@endsection

@section('frame-body')
   <p class="card-text"><i>{{$date_time}}</i></p>
   <p class="card-text">{{$comment}}</p>
@endsection