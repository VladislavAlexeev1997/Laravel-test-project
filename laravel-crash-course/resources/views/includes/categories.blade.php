<!-- Шаблон отображения категорий на страницах веб-прилоения -->
<div class="btn-group mb-4" role="group" aria-label="Basic outlined example">
    <a href="{{route('index')}}" class="btn btn-outline-primary">Все категории</a>
    @foreach($categories as $category)
    <a href="{{route('getPostByCategory', $category['slug'])}}" class="btn btn-outline-primary">{{$category->title}}</a>
    @endforeach
</div>