@extends('layouts.main-layout')

@section('title', $post->title)

@section('content')
    @include('includes.categories')

    <div><a href="{{route('getPostByCategory', $slug_category)}}" class="btn btn-outline-primary mb-4">К статьям категории {{$current_category->title}}</a></div>

    <article>
        {!! $post->text !!}
    </article>

    <div class="card mb-4">
        <div class="card-header">
            <h6 class="card-title">Оставить комментарий</h6>
        </div>
        <div class="card-body">
            <form class="card-body" method="POST">
                @csrf
                <p class="card-text">Имя комментирующего: <input type="text" name="user_name"></input></p>
                <p class="card-text">Текст комменария:<br><textarea name="comment" cols="100" rows="5"></textarea></p>
                <input type="submit" class="btn btn-outline-primary" value="Опубликовать комментарий">
            </form>
                @if (count($errors) > 0)
                   <div class="alert alert-danger">
                      <ul>
                         @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                         @endforeach
                      </ul>
                   </div>
                @endif
        </div>
    </div>


    <h5>Коментарии к посту:</h5>

    @foreach($comments as $comment)
        @include('includes.view_comment', array(
            'user_name' => $comment->user_name,
            'date_time' => $comment->getCreateDate(),
            'comment' => $comment->comment,))
    @endforeach

@endsection