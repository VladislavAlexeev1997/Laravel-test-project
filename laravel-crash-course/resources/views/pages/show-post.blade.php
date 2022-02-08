<!--Страница отображения выбранного пользователем поста -->
@extends('layouts.main-layout')

@section('title', $post->title)

@section('content')
    @include('includes.categories')

    <div><a href="{{route('getPostByCategory', $slug_category)}}" class="btn btn-outline-primary mb-4">К статьям категории {{$current_category->title}}</a></div>

    <!-- Содержимое поста -->
    <article>
        {!! $post->text !!}
    </article>

    <!-- Форма для отправки нового комментария -->
    <div class="card mb-4">
        <div class="card-header">
            <h6 class="card-title">Оставить комментарий</h6>
        </div>
        <div class="card-body">
            <form class="card-body" method="POST">
                @csrf
                <p class="card-text">Имя комментирующего: <input type="text" name="user_name"></input></p>
                <p class="card-text">Текст комменария:<br><textarea name="comment" cols="100" rows="5"></textarea></p>
                <input type="hidden" name="slug_category" value="{{$slug_category}}"></input>
                <input type="hidden" name="slug_post" value="{{$post->slug}}"></input>
                <input type="hidden" name="post_id" value="{{$post->id}}"></input>
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

    <!-- Комментарии к посту, написанные ранее другими пользователями -->
    <h5>Коментарии к посту:</h5>

    @foreach($comments as $comment)
        <div class="card mb-4">
            <div class="card-header">
                <p class="card-text">Пользователь <b>{{$comment->user_name}}</b></p>
            </div>
            <div class="card-body">
                <p class="card-text"><i>{{$comment->getCreateDate()}}</i></p>
                <p class="card-text">{{$comment->comment}}</p>
            </div>
        </div>
    @endforeach

@endsection