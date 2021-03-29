@extends('layouts.main')
@section('content')
   <div class="row">
  <div class="col-lg-8 col-md-10 mx-auto">
   @forelse ($newsList as $key => $news)
   <article class="post-preview">
    <a href="{{ route('news.show', ['id' => ++$key]) }}">
     <h2 class="post-title">{!! $news  !!}</h2>

     <h3 class="post-subtitle">Problems look mighty small from 150 miles up</h3>

    </a>
    <p class="post-meta">Опубликовал Админ
     {{ now() }} &middot;
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



