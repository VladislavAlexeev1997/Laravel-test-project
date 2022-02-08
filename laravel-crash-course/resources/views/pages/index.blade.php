@extends('layouts.main-layout')

@section('title', 'Блог')

@section('content')
    @include('includes.categories')
    @foreach($posts as $post)
    <div class="card mb-4">
        <div class="card-header">
            <a href="{{route('getPostByCategory', $post->category['slug'])}}">{{$post->category['title']}}</a>
        </div>
        <div class="card-body">
            <h5 class="card-title">{{$post['title']}}</h5>
            <p class="card-text">{{$post->description}}</p>
            <a href="{{route('getPost', [$post->category['slug'], $post['slug']])}}" class="btn btn-primary">Читать подробнее</a>
        </div>
    </div>
    @endforeach

    {{$posts->links('vendor.pagination.bootstrap-4')}}
@endsection