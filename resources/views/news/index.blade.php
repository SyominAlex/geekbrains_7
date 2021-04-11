@extends('layouts.main')
@section('content')
   <div class="row">
  <div class="col-lg-8 col-md-10 mx-auto">
   @forelse ($news as $newsItem)
   <article class="post-preview">
    <a href="{{ route('news.show', ['id' => $newsItem->id]) }}">
     <h2 class="post-title">{!! $newsItem->title  !!}</h2>

     <h3 class="post-subtitle">{!! $newsItem->text !!}</h3>

    </a>
    <p class="post-meta">Опубликовал Админ
     {{ $newsItem->created_at ?? now() }} &middot;
        <i>Категория: {{ $newsItem->category->title }}</i>
    </p>
   </article>
   <hr>
   @empty
    <h2>Новостей нет</h2>
  @endforelse



   <!-- Pager -->
   <div class="clearfix">
    <a class="btn btn-primary float-right" href="">View All Posts &rarr;</a>
   </div>

  </div>
 </div>
@endsection



